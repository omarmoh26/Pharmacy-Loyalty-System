<head>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Checkout.css">
</head>

<head>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Viewusers.css">
</head>
<?php
require_once("classes.php");
$_SESSION['newcart'] = clone $_SESSION['cart'];
class Checkout extends View
{
    public function output()
    {
        $customerPoints = $this->model->getCustomerPoints($_GET['cid']);


        require APPROOT . '/views/inc/header.php';

        $action = URLROOT . 'pages/Checkout';
        $text = <<<EOT
    
    EOT
?>
        <div class="w">
            <div class="middle">

                <div class="check"><?php echo $this->model->getCustomerName($_GET['cid']) ?>'s reciept</div>

                <div class="top">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-box no-header clearfix">
                                <div class="main-box-body clearfix">
                                    <div class="table-responsive">
                                        <?php

                                        if (count($_SESSION['newcart']->productsQuantity) > 0) {
                                            // $item_total = 0;
                                        ?>
                                            <table class="table user-list">
                                                <thead>
                                                    <tr>
                                                        <th><strong>Name</strong></th>
                                                        <th><strong>Quantity</strong></th>
                                                        <th><strong>Price</strong></th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                foreach ($_SESSION['newcart']->productsQuantity as $productID => $quantity) {
                                                    $product = new Product($productID);
                                                ?>
                                                    <tr>
                                                        <td><strong><?php echo $product->name; ?></strong></td>
                                                        <td><?php echo $quantity; ?></td>
                                                        <td><?php echo  $product->price . ' EGP'; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                                <tr>
                                                    <td colspan="4"><strong> Total:
                                                            <?php
                                                            echo  $_SESSION['item_total'] . "  EGP";
                                                            ?>
                                                        </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"><strong><i>
                                                                <?php echo "Current Points: " . $customerPoints . "</br> Gives: " . $customerPoints * 0.1 . " EGP Discount";

                                                                ?></i>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </table>

                                        <?php
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <form action="<?php $action ?>" method="post" onsubmit="return(cashinput(<?php echo  $_SESSION['item_total']; ?>,<?php echo $customerPoints; ?>));">
                <div class="buttom">
                    <div class="radio">
                        <label class="rad-label">
                            <input type="radio" name="rad" id="cash" class="rad-input" onclick="javascript:showselected();">
                            <div class="rad-design"></div>
                            <div class="rad-text">Cash </div>
                            <div id="ifCash" style="visibility:hidden; display:inline;">
                                <!-- CASHH -->
                                <input type='text' id='cashonly' name='cashonly' placeholder=' Cash amount....' onkeyup="javascript:cashinput(<?php echo  $_SESSION['item_total']; ?>,<?php echo $customerPoints; ?> )"><br>
                                <div id='cashonlyerorr' style='visibility:hidden;  display:inline; color:red; font-family: monospace;'>Enter a number minimum of <?php echo  $_SESSION['item_total']; ?> EGP</div>
                            </div>
                        </label>
                        <label class="rad-label">
                            <input type="radio" name="rad" id="pc" class="rad-input" onclick="javascript:showselected();">
                            <div class="rad-design"></div>
                            <div class="rad-text">Points with Cash</div>
                            <div id="ifPC" style="visibility:hidden; display:inline;">
                                <!-- CASHH AND POINTS -->
                                <input type='text' id='cashNpoints' name='cashNpoints' placeholder=' Cash amount....' onkeyup="javascript:cashinput(<?php echo ($_SESSION['item_total'] - ($customerPoints * 0.1)); ?>,<?php echo $customerPoints; ?> )">
                                <div id='cperorr' style='visibility:hidden;  display:inline; color:red; font-family: monospace;'><?php if (($_SESSION['item_total'] - ($customerPoints * 0.1)) < 0) echo "Choose Cash Only or Points Only";
                                                                                                                                    else echo "Enter a number minimum of " . ($_SESSION['item_total'] - ($customerPoints * 0.1)) . "EGP"; ?> </div>
                            </div>
                        </label>

                        <label class="rad-label">
                            <input type="radio" name="rad" class="rad-input" id="p" onclick="javascript:showselected(); ">
                            <div class="rad-design"></div>
                            <div class="rad-text">Points Only</div>
                            <?php
                            if ((($customerPoints) * 0.1)  < $_SESSION['item_total']) { ?>
                                <div id='show-me' style='visibility:hidden;  display:inline; color:red; font-family: monospace;'>Points are not enough for this order</div>
                            <?php } else {
                                echo "</br>";
                            }
                            ?>
                        </label>
                        </br>
                        <input type="hidden" name="customerID" value="<?php echo $_GET['cid']; ?>">
                        <input type="hidden" name="customerPoints" value="<?php echo $customerPoints; ?>">
                        <input type="hidden" name="total" value="<?php echo $_SESSION['item_total']; ?>">
                        <div id="bb">
                            <input type="submit" value="Confirm Payment" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        </div>
<?php
        echo $text;
        require APPROOT . '/views/inc/footer.php';
    }
}
?>
<script>
    var pattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[-+_!@#$%^&*.,?]).+$");
    var upp = new RegExp(
        "^(?=.*[A-Z]).+$"
    );
    var loww = new RegExp(
        "^(?=.*[a-z]).+$"
    );
    var digitt = new RegExp(
        "^(?=.*\\d).+$"
    );
    var special = new RegExp(
        "^(?=.*[-+_!@#$%^&*.,?]).+$"
    );

    function showselected() {
        if (document.getElementById('cash').checked) {
            document.getElementById('ifCash').style.visibility = 'visible';
        } else {
            document.getElementById('ifCash').style.visibility = 'hidden';
            document.getElementById('cashonly').value = ''
        }

        if (document.getElementById('pc').checked) {
            document.getElementById('ifPC').style.visibility = 'visible';
        } else {
            document.getElementById('ifPC').style.visibility = 'hidden';
            document.getElementById('cashNpoints').value = ''
        }
        if (document.getElementById('p').checked) {
            document.getElementById('show-me').style.visibility = 'visible';
            return false;
            
        } else document.getElementById('show-me').style.visibility = 'hidden';

    }

    function cashinput(total, points) {
        if (document.getElementById('cashonly').value != "") {
            if (document.getElementById('cashonly').value < total) {
                document.getElementById('cashonlyerorr').style.visibility = 'visible';
                return false;
            } else if ((upp.test(document.getElementById('cashonly').value)) || (loww.test(document.getElementById('cashonly').value)) || (special.test(document.getElementById('cashonly').value))) {
                document.getElementById('cashonlyerorr').style.visibility = 'visible';
                return false;
            } else {
                document.getElementById('cashonlyerorr').style.visibility = 'hidden';
            }
        } else {
            document.getElementById('cashonlyerorr').style.visibility = 'hidden';
        }

        if (document.getElementById('cashNpoints').value != "") {
            if (total<(points * 0.1)) {
                document.getElementById('cperorr').style.visibility = 'visible';
                return false;
            } else if ((upp.test(document.getElementById('cashNpoints').value)) || (loww.test(document.getElementById('cashNpoints').value)) || (special.test(document.getElementById('cashNpoints').value))) {
                document.getElementById('cperorr').style.visibility = 'visible';
                return false;
            } else {
                document.getElementById('cperorr').style.visibility = 'hidden';
            }
        } else {
            document.getElementById('cperorr').style.visibility = 'hidden';
        }
        if (document.getElementById('cashNpoints').value == "" && document.getElementById('cashonly').value == "" && !(document.getElementById('p').checked)) {
            document.getElementById('cperorr').style.visibility = 'hidden';
            document.getElementById('cashonlyerorr').style.visibility = 'hidden';
            return false;
        } else {
            document.getElementById('cperorr').style.visibility = 'hidden';
            document.getElementById('cashonlyerorr').style.visibility = 'hidden';

        }

        return true;

    }
</script>