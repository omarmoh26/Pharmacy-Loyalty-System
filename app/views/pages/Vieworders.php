<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<head>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Viewusers.css">
</head>
<?php
class Vieworders extends View
{

    public function output()
    {

        require APPROOT . '/views/inc/header.php';

        $action = URLROOT . 'pages/Vieworders';
        $text = <<<EOT
      <form action="$action" method="post">
           
      EOT;
?>
        <span id="demo"></span>

        <div class="containn">
            <div class="container bootstrap snippets bootdey">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-box no-header clearfix">
                            <div class="main-box-body clearfix">
                                <div class="table-responsive">
                                    <table class="table user-list">
                                        <thead>
                                            <tr>
                                                <th><span>Order ID</span></th>
                                                <th><span>Customer ID</span></th>
                                                <th><span>Cashier ID</span></th>
                                                <th><span>Date and Time</span></th>
                                                <th><span>Total</span></th>
                                                <th><span>Discount</span></th>
                                                <th><span>Paid</span></th>
                                                <th><span>Change</span></th>
                                                <th><span>Added Points</span></th>
                                                <th><span>Used Points</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $result = $this->model->getAllOrders();

                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['order_id'] ?></td>
                                                    <td><?php echo $row['customer_id'] ?></td>
                                                    <td><?php echo $row['cashier_id'] ?></td>
                                                    <td><?php echo $row['date_time'] ?></td>
                                                    <td><?php echo $row['total'] ?></td>
                                                    <td><?php echo $row['discount'] ?></td>
                                                    <td><?php echo $row['paid'] ?></td>
                                                    <td><?php echo $row['t_change'] ?></td>
                                                    <td><?php echo $row['added_points'] ?></td>
                                                    <td><?php echo $row['used_points'] ?></td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    function validate() {
        let text = "To confirm press [ok]";
        if (confirm(text) == true) {
            text = "Customer Deleted";

        } else {
            return false;
        }
        document.getElementById("demo").innerHTML = text;
    }
</script>