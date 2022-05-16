<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Checkout.css"></head>
<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Viewusers.css"></head>

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
                                          </tr>

                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                          </tr>

                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                          </tr>

                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                          </tr>

                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                          </tr>

                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                          </tr>

                                          <tr>
                                              <td>
                                                  <span class="user-head">Product1</span>
                                                  <br>
                                                  <span class="user-subhead">local</span>
                                              </td>
                                              <td>15.8</td>
                                              <td>2</td>
                                          </tr>
                                          
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
          </div>

        </div>
        

        <div class="buttom">
          <div class="text2">

            <p1>Current Points : 4314413413413</p1>
            <span class="brmin"></span>
            <p2>Added Points : </p2>
            <span class="brmin"></span>
            <p3>Used Points : </p2>
            <span class="brmin"></span>

            <p4 class="boldd">Total Points : </p3>
            <hr>

            <p4>Price : </p4>
            <span class="brmin"></span>
            <p5>Disscount : </p5>
            <span class="brmin"></span>

            <p6 class="boldd">Total Price : 1231342341414141</p6>

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
