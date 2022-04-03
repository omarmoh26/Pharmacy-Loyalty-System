<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/newcust.css"></head>

<?php
class User extends View
{
  public function output()
  {

    require APPROOT . '/views/inc/header.php';
    $action = URLROOT . 'pages/User';
    
    $text = <<<EOT
    <form action="$action" method="post">
    EOT
    ?>
    <a class="wrapper3" href="<?php echo URLROOT . 'customers/NewCust'; ?>">New Custromer</a>
    <a class="wrapper2" href="<?php echo URLROOT . 'customers/OldCust'; ?>">Old Custromer</a>
    <?php
    <<<EOT
    </form>
  
    EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>