<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<head>
    <title>Live Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/
     bootstrap.min.css">
</head>
<?php
class searchform extends View
{
  public function output()
  {

    require APPROOT . '/views/inc/header.php';
    
    
    ?>
      <div class="container" style="max-width:50%;">
        <div class="text-center mt-5mb-4">
            <h2>PHP MySQL Live Search</h2>
        </div>
        <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search ...">
    </div>
    <div id="searchresult"></div>
    <?php
    if (isset($_POST['input'])) {
        $con=mysqli_connect("localhost", "root", "", "pharmacy_loyalty_system");
        if(!$con){
            echo"Connection Failed".mysqli_connect_error();
        }
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
    require APPROOT . '/views/inc/footer.php';
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

                        url: "searchform",
                        method: "POST",
                        data: {input: input},

                        success: function(data) {
                            $("#searchresult").html(data);
                        }
                    });
                } 
           
            });
        });
    </script>

<?php
}
}
?>