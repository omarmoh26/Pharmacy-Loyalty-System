<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Admin.css"></head>
<a class="back" href="<?php echo URLROOT . 'pages/Admin'; ?>">Back</a>

<?php
class Editaccount extends View
{
  public function output()
  {

    require APPROOT . '/views/inc/header.php';
    $action = URLROOT . 'pages/Admin';
    
    $text = <<<EOT
    <form action="$action" method="post">
    EOT
    ?>
    <a class="wrapper2" href="<?php echo URLROOT . 'pages/Editname'; ?>">Edit name</a>
    <a class="wrapper3" href="<?php echo URLROOT . 'pages/Editpassword'; ?>">Edit password</a>
    <a class="wrapper4" href="<?php echo URLROOT . 'pages/Deleteaccount'; ?>"> delete Account</a>


    <?php
    <<<EOT
    </form>
  
    EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>
