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
        </div>
        
        <div class="right">
          <h2>BASKET</h2>
          
          <div class="btext">
            <h3>Total:</h3>
            <h4>Points:</h4>
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
