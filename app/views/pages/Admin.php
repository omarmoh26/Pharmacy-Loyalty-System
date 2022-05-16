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
    EOT
    ?>
    <a class="wrapper2" href="<?php echo URLROOT . 'users/Viewusers'; ?>">view users</a>
    <a class="wrapper3" href="<?php echo URLROOT . 'pages/Editaccount'; ?>">Account</a>
    <a class="wrapper4" href="<?php echo URLROOT . 'pages/products'; ?>">products</a>

    <?php
    <<<EOT
    </form>
  
    EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>
