<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Admin.css"></head>

<?php
class Admin extends View
{
  public function output()
  {

    require APPROOT . '/views/inc/header.php';
    $action = URLROOT . 'pages/Admin';
    $text = <<<EOT
    <form action="$action" method="post">
    <div class="wrapper ">
    <input type="button" value="View Employees" >
    <input type="button" value="Edit Employees" >
    <input type="button" value="delete Employees" >
    </div>
    </form>
  
    EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>