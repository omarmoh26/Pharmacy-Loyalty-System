<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Order2.css"></head>
<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Search.css"></head>
<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Viewusers.css"></head>


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
          <div class="top">
          <div class="row">
                  <div class="col-lg-12">
                      <div class="main-box no-header clearfix">
                          <div class="main-box-body clearfix">
                              <div class="table-responsive">
                                  <table class="table user-list">
                                      <thead>
                                          <tr>
                                          <th><span>Product</span></th>
                                          <th><span>Price</span></th>
                                          <th><span>Quantity</span></th>
                                          <th>&nbsp;</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                             
                                              <td style="width: 30%;">
                                                  
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-plus-square fa-stack-2x"style="color:#00ef54;"></i>
                                                      </span>
                                                  </a>
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-minus-square fa-stack-2x" style="color:#0099ff;"></i>
                                                      </span>
                                                  </a>
                                                  <a class="table-link danger" href="#">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-square fa-stack-2x"></i>
                                                          <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                      </span>
                                                  </a>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                             
                                              <td style="width: 30%;">
                                                  
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-plus-square fa-stack-2x"style="color:#00ef54;"></i>
                                                      </span>
                                                  </a>
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-minus-square fa-stack-2x" style="color:#0099ff;"></i>
                                                      </span>
                                                  </a>
                                                  <a class="table-link danger" href="#">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-square fa-stack-2x"></i>
                                                          <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                      </span>
                                                  </a>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                             
                                              <td style="width: 30%;">
                                                  
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-plus-square fa-stack-2x"style="color:#00ef54;"></i>
                                                      </span>
                                                  </a>
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-minus-square fa-stack-2x" style="color:#0099ff;"></i>
                                                      </span>
                                                  </a>
                                                  <a class="table-link danger" href="#">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-square fa-stack-2x"></i>
                                                          <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                      </span>
                                                  </a>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                             
                                              <td style="width: 30%;">
                                                  
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-plus-square fa-stack-2x"style="color:#00ef54;"></i>
                                                      </span>
                                                  </a>
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-minus-square fa-stack-2x" style="color:#0099ff;"></i>
                                                      </span>
                                                  </a>
                                                  <a class="table-link danger" href="#">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-square fa-stack-2x"></i>
                                                          <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                      </span>
                                                  </a>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                             
                                              <td style="width: 30%;">
                                                  
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-plus-square fa-stack-2x"style="color:#00ef54;"></i>
                                                      </span>
                                                  </a>
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-minus-square fa-stack-2x" style="color:#0099ff;"></i>
                                                      </span>
                                                  </a>
                                                  <a class="table-link danger" href="#">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-square fa-stack-2x"></i>
                                                          <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                      </span>
                                                  </a>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                             
                                              <td style="width: 30%;">
                                                  
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-plus-square fa-stack-2x"style="color:#00ef54;"></i>
                                                      </span>
                                                  </a>
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-minus-square fa-stack-2x" style="color:#0099ff;"></i>
                                                      </span>
                                                  </a>
                                                  <a class="table-link danger" href="#">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-square fa-stack-2x"></i>
                                                          <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                      </span>
                                                  </a>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                             
                                              <td style="width: 30%;">
                                                  
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-plus-square fa-stack-2x"style="color:#00ef54;"></i>
                                                      </span>
                                                  </a>
                                                  <a href="#" class="table-link text-info">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-minus-square fa-stack-2x" style="color:#0099ff;"></i>
                                                      </span>
                                                  </a>
                                                  <a class="table-link danger" href="#">
                                                      <span class="fa-stack">
                                                          <i class="fa fa-square fa-stack-2x"></i>
                                                          <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                      </span>
                                                  </a>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>

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
