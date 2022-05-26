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

            $query = "SELECT * FROM product WHERE name LIKE'{$input}%'";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-bordered table-striped mt-4">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Product_Type</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $Price = $row['Price'];
                            $Product_Type = $row['Product_Type'];

                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $Price; ?></td>
                                <td><?php echo $Product_Type; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
<?php
            } else {
                echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
            }
        }
    }
}
?>