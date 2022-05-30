<link rel="stylesheet" href="<?php echo URLROOT; ?>css/Search.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/Order2.css">



<?php
class livesearch extends view
{
    public function output()
    {

        $con = mysqli_connect("localhost", "root", "", "pharmacy_loyalty_system");
        if (!$con) {
            echo "Connection Failed" . mysqli_connect_error();
        }
        if (isset($_POST['input'])) {

            $input = $_POST['input'];

            $query = "SELECT product.id,product.name,product.Price, product_type.Type FROM product,product_type where product.Product_Type= product_type.ID and product.name LIKE'{$input}%'";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) { ?>

                <div class="searcht">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-box no-header clearfix">
                                <div class="main-box-body clearfix">
                                    <div class="table-responsive">
                                        <table class="table user-list">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Product_Type</th>
                                                    <th>select</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $id = $row['id'];
                                                    $name = $row['name'];
                                                    $Price = $row['Price'];
                                                    $Product_Type = $row['Type'];

                                                ?>
                                                    <tr>
                                                        <td style="width: 30%;"><?php echo $id; ?></td>
                                                        <td style="width: 30%;"><?php echo $name; ?></td>
                                                        <td style="width: 30%;"><?php echo $Price; ?></td>
                                                        <td style="width: 30%;"><?php echo $Product_Type; ?></td>
                                                        <td style="width: 30%;">
                                                            <a class="add" href="<?php echo URLROOT . 'pages/Order'; ?>?cid=<?php echo $_POST['cid']?>&pid=<?php echo $row['id']?>">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-check-circle fa-stack-2x" style="color:hsl(45, 100%, 39%);"></i>
                                                                </span>
                                                            </a>
                                                        </td>

                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

<?php
            } else {
                echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
            }
        }
    }
}
?>