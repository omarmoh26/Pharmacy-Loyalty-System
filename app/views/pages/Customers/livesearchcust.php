<!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Search.css"> -->
<!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Order2.css"> -->



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

            if (trim($input) == "") {
                $query = "SELECT * FROM `customer`";
            } else {
                $query = "SELECT * FROM `customer` WHERE id LIKE'{$input}%'  OR phone_number LIKE'{$input}%'";
            }
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) { ?>

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
                                                        <th>id</th>
                                                        <th>Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Address</th>
                                                        <th>&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <tr id="<?php echo $row['id'] ?>">

                                                            <td><?php echo $row['id'] ?></td>
                                                            <td><?php echo $row['name'] ?></td>
                                                            <td><?php echo $row['phone_number'] ?></td>
                                                            <td><?php echo $row['address'] ?></td>

                                                            <td style="width: 20%;">
                                                                <a class="table-link text-info" href="<?php echo URLROOT . 'customers/Editcustomer'; ?>?id=<?php echo $row['id'] ?>">
                                                                    <span class="fa-stack">
                                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                                    </span>
                                                                </a>

                                                                <button class="table-link danger">
                                                                    <span class="fa-stack">
                                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                                    </span>
                                                                </button>

                                                                <a class="table-link order" href="<?php echo URLROOT . 'pages/Order'; ?>?id=<?php echo $row['id'] ?>">
                                                                    <span class="fa-stack">
                                                                        <i class="fa fa-square fa-stack-2x"></i>
                                                                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                                                                    </span>
                                                                </a>
                                                            </td>
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
            } else { ?>
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
                                                        <th style="color:red">No Customer Found</th>
                                                    </tr>


                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php }
        }
    }
}
?>
<script type="text/javascript">
    $(".danger").click(function() {
        var id = $(this).parents("tr").attr("id");


        if (confirm('Are you sure to remove this record ?')) {
            $.ajax({
                url: 'Deletecustomer',
                type: 'GET',
                data: {
                    id: id
                },
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    $("#" + id).remove();
                    alert("Record removed successfully");
                }
            });
        }
    });
</script>