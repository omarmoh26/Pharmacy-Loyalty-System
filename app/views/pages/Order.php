<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Order2.css"></head>
<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Search.css"></head>

<?php
class Order extends View
{
  public function output()
  {

    require APPROOT . '/views/inc/header.php';
    
    $action = URLROOT . 'pages/Order';
    $text = <<<EOT
    <form action="$action" method="post">
    EOT
    ?>
      <a class="wrapper2" href="<?php echo URLROOT . 'customers/OldCust'; ?>">Back</a>
      <div class="wrapper">
        
        <div class="left">
          <a class="checkout" href="<?php echo URLROOT . 'pages/Checkout'; ?>">Checkout</a>
          <input type="text" name="course" class="input-search" placeholder="Search For Products...">
          <div class="radio">
        
            <label class="rad-label">
              <input type="radio" class="rad-input" name="rad">
              <div class="rad-design"></div>
              <div class="rad-text">Cash</div>
            </label>
        
            <label class="rad-label">
              <input type="radio" class="rad-input" name="rad">
              <div class="rad-design"></div>
              <div class="rad-text">Cash&Points</div>
            </label>
        
            <label class="rad-label">
              <input type="radio" class="rad-input" name="rad">
              <div class="rad-design"></div>
              <div class="rad-text">Points</div>
            </label>
          </div>
          <input type="text" class="cash" placeholder="cash" name="cash">
        </div>
        
        <div class="right">
          <div class="Bask"><h1>BASKET</h1></div>
          
          
          <div class="btext">
            <p4>Points: 412412414</p4>
            <br>
            <hr style="width:600px">
            <p3>Total:</p3>
            <hr>
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
