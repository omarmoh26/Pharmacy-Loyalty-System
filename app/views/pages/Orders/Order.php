<head>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Order2.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Search.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Viewusers.css">
</head>


<?php
require_once("classes.php");
$_SESSION['cart'] = "";
class Order extends View
{
    public function output()
    {
        $_SESSION['cart'] = new Cart();
        if (!empty($_POST['cart'])) {
            $_SESSION['cart']->productsQuantity = json_decode($_POST['cart'], true);
        }
        if (!empty($_GET["action"])) {
            switch ($_GET["action"]) {
                case "add":
                    if (!empty($_POST["quantity"])) {
                        $_SESSION['cart']->addProduct($_GET["id"], $_POST["quantity"]);
                    }
                    break;
                case "remove":
                    $_SESSION['cart']->removeProduct($_GET["id"]);
                    break;
                case "empty":
                    $_SESSION['cart']->emptyCart();
                    break;
            }
        }

        require APPROOT . '/views/inc/header.php';

        $action = URLROOT . 'pages/Order';
        $text = <<<EOT
    <form action="$action" method="post">
    EOT
?>
        <div class="w">

            <!-- -------------------------------------LEFT SIDE--------------------------------------- -->

            <div class="left">
                <div class="checkout">
                    <a href="<?php echo URLROOT . 'pages/Checkout'; ?>">Checkout</a>
                </div>
                <div class="container" style="max-width:50%;">
                    <input type="text" class="input-search" id="live_search" autocomplete="off" placeholder="Search for products...">
                </div>
                <div class="result">
                    <div id="searchresult"></div>
                </div>


                <input type="text" class="cash" placeholder="cash" name="cash">
            </div>

            <!-- -------------------------------------RIGHT SIDE--------------------------------------- -->

            <div class="right">
                <div class="top">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-box no-header clearfix">
                                <div class="main-box-body clearfix">
                                    <div class="table-responsive">
                                        <div class="txt-heading">

                                        </div>
                                        <?php

                                        if (count($_SESSION['cart']->productsQuantity) > 0) {
                                            $item_total = 0;
                                        ?>
                                            <table class="table user-list">
                                                <thead>
                                                    <tr>
                                                        <th><strong>Name</strong></th>
                                                        <th><strong>Quantity</strong></th>
                                                        <th><strong>Price</strong></th>
                                                        <th>
                                                            <button id="empty1">
                                                                <a id="empty2" href="Order?cid=<?php echo $_GET['cid'] ?>&action=empty">Empty Cart</a>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                foreach ($_SESSION['cart']->productsQuantity as $productID => $quantity) {
                                                    $product = new Product($productID);
                                                ?>
                                                    <tr>
                                                        <td><strong><?php echo $product->name; ?></strong></td>
                                                        <td><?php echo $quantity; ?></td>
                                                        <td><?php echo "$" . $product->price; ?></td>
                                                        <td>
                                                            <form method="post" action="Order?cid=<?php echo $_GET['cid'] ?>&action=remove&id=<?php echo $product->id; ?>">
                                                                <input type="submit" value="Remove Item" class="btnAddAction" id="remove" />
                                                                <input type='hidden' name='cart' value='<?php echo (json_encode($_SESSION['cart']->productsQuantity)); ?>' />
                                                            </form>

                                                        </td>
                                                    </tr>
                                                <?php
                                                    $item_total += ($product->price * $quantity);
                                                }
                                                ?>
                                                <tr>
                                                    <td colspan="4"><strong >Total:
                                                        <?php
                                                        echo  $item_total."  EGP"; ?>
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

                    <div class="Bask">
                        <h1><?php echo $this->model->getCustomerName($_GET['cid']) ?>'s Cart</h1>
                    </div>


                    <div class="btext">
                        <p4>Points: 412412414</p4>
                        <br>
                        <hr style="width:300px">

                    </div>

                </div>
            </div>
            <div class="radio">

                <label class="rad-label">
                    <input type="radio" class="rad-input" name="rad">
                    <div class="rad-design"></div>
                    <div class="rad-text">Cash</div>
                </label>

                <label class="rad-label">
                    <input type="radio" class="rad-input" name="rad">
                    <div class="rad-design"></div>
                    <div class="rad-text">Cash&Points</div>
                </label>

                <label class="rad-label">
                    <input type="radio" class="rad-input" name="rad">
                    <div class="rad-design"></div>
                    <div class="rad-text">Points</div>
                </label>
            </div>
    <?php
        <<<EOT
    </form>
  
    EOT;
        echo $text;
        require APPROOT . '/views/inc/footer.php';
    }
}
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#live_search").keyup(function() {

                var input = $(this).val();
                //alert(input);

                if (input != "") {
                    $.ajax({

                        url: "livesearch",
                        method: "POST",
                        data: {
                            input: input,
                            cid: <?php echo $_GET['cid'] ?>
                        },

                        success: function(data) {
                            $("#searchresult").html(data);
                        }
                    });
                }

            });
        });
    </script>