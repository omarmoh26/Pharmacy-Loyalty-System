<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<head>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Viewusers.css">
</head>
<?php
class Viewemployees extends View
{

    public function output()
    {

        require APPROOT . '/views/inc/header.php';

        $action = URLROOT . 'pages/Viewemployees';
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
                                                <th><span>ID</span></th>
                                                <th><span>Name</span></th>
                                                <th><span>Username</span></th>
                                                <th><span>Type</span></th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $result = $this->model->getAllEmployees();

                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['username'] ?></td>
                                                    <td><?php 
                                                    if($row['type'] ==1){
                                                        echo "admin";
                                                    }
                                                    else {
                                                        echo "employee";
                                                    }
                                                    ?></td>

                                                    <td style="width: 20%;">
                                                        <button id="boxx">
                                                            <a class="table-link text-info" href="<?php echo URLROOT . 'users/Editemployee'; ?>?id=<?php echo $row['id'] ?>">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                                        </button>
                                                        <button onclick="return(validate())" id="boxx">
                                                            <a class="table-link danger" href="<?php echo URLROOT . 'users/Deleteemployee'; ?>?id=<?php echo $row['id'] ?>">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                        </button>
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
            text = "Employee Deleted";

        } else {
            return false;
        }
        document.getElementById("demo").innerHTML = text;
    }
</script>