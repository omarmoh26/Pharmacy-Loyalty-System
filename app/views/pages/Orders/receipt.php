<html>

<head>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/receipt.css">
</head>

<?php
class receipt extends View
{
    public function output()
    {

        require APPROOT . '/views/inc/header.php';
        $action = URLROOT . 'pages/Admin';

        $text = <<<EOT
    <form action="$action" method="post">
    EOT
?>
        <div class="frame2" id="section-to-print">

            <div id="pharmacy-text-frame">
                <div id="pharmacy-text">
                    <h>SARAYA CARE</h>
                </div>
            </div>

            <div id="receipt-text-frame">
                <div id="receipt-text">
                    <h>Reciept</h>
                </div>
            </div>

            <div id="data-text" >
                <?php
                $result = $this->model->getOrderData($_GET['oid']);
                if ($row = mysqli_fetch_array($result)) {
                ?>
                    <h>date-time: <?php echo $row['date_time'] ?></h>
                    <br>
                    <h>order id: <?php echo $row['order_id'] ?></h>
                    <br>
                    <h>cashier name: <?php echo $row['cashname'] ?></h>
                    <br>
                    <h>cashier id: <?php echo $row['cashier_id'] ?></h>
                    <table id="mytable">
                        <thead class="thead-dark">
                            <tr>
                                <th>name</th>
                                <th>price</th>
                                <th>quantity</th>
                                <th>total price</th>

                            </tr>
                        </thead>
                        <?php
                        $result1 = $this->model->getOrderDetails();

                        while ($row1 = mysqli_fetch_array($result1)) {
                        ?>
                            <tr>
                                <td><?php echo $row1['name'] ?></td>
                                <td><?php echo $row1['Price'] ?> EGP</td>
                                <td><?php echo $row1['quantity'] ?></td>
                                <td><?php echo $row1['total_price'] ?> EGP</td>

                            </tr>
                        <?php } ?>
                    </table>
                    <br>
                    <h>total: <?php echo $row['total'] ?></h>
                    <br>
                    <h>disscount: <?php echo $row['discount'] ?></h>
                    <br>
                    <h>toal after disscount:</h>
                    <br>
                    <h>paid: <?php echo $row['paid'] ?></h>
                    <br>
                    <h>change: <?php echo $row['t_change'] ?></h>
                    <hr>

                    <h>customer name: <?php echo $row['cname'] ?></h>
                    <br>
                    <h>customer id: <?php echo $row['customer_id'] ?></h>
                    <hr>

                    <h>added points: <?php echo $row['added_points'] ?></h>
                    <br>
                    <h>used points: <?php echo $row['used_points'] ?></h>
                    <br>
                    <h>total current points: <?php echo $row['cpoints'] ?></h>
                    <hr>
                <?php } ?>
                <div id="note-frame">
                    <t id="note">please keep your invoice in case of any product replacements or retrieval within 14 days from the date of purchase</t>
                </div>
            </div>
        </div>

        <div class="done-frame">
            <a id="donebut" class="btn btn-secondary btn-lg mb-3" href="<?php echo URLROOT . 'customers/oldCust'; ?>">Done</a>
        </div>
        <div class="print-frame">

            <button class="btn btn-secondary btn-lg mb-3" id="printbut" onclick="window.print()">Print</button>

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
<script>
    function printDiv() {
        var divContents = document.getElementById("printedDiv").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write('<body >');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>

</html>