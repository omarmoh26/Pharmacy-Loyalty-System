<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<head>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Viewusers.css">
</head>
<?php
class Viewodetails extends View
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
                                                <th><span>Product name</span></th>
                                                <th><span>Quantity</span></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = $_GET['id'];
                                            if (filter_var($id, FILTER_VALIDATE_INT)) {
                                                $result = $this->model->getOrderDetails($id);
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $row['order_id'] ?></td>
                                                        <td><?php echo $row['name'] ?></td>
                                                        <td><?php echo $row['quantity'] ?></td>
                                                    </tr>
                                            <?php }
                                            } else {
                                                echo ("Wrong Order Id");
                                            } ?>
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