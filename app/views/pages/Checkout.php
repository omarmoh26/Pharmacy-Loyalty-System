<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Checkout.css"></head>

<?php
class Checkout extends View
{
  public function output()
  {

    require APPROOT . '/views/inc/header.php';
    
    $action = URLROOT . 'pages/Checkout';
    $text = <<<EOT
    <form action="$action" method="post">
    EOT
    ?>
      <a class="wrapper2" href="<?php echo URLROOT . 'pages/Order'; ?>">Back</a>
      <div class="wrapper">
          <div class="middle">
            <div class="check">Checkout</div>
            <div class="text1">
                <p1>Current Points : 4314413413413</p1>
                <span class="brmedium"></span>
                <p2>Added Points : </p2>
                <span class="brmedium"></span>
                <p3>Used Points : </p2>
                <span class="brmedium"></span>
                <div class="boldd">
                <p4>Total Points : </p3>
                <hr>
                </div>

                <span class="brmedium"></span>
                <p4>Price : </p4>
                <span class="brmedium"></span>
                <p5>Disscount : </p5>
                <span class="brmedium"></span>

                <div class="boldd">
                <p6>Total Price : 1231342341414141</p6>
                <hr>
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
