<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Viewusers.css"></head>



<?php
class products extends View
{
  
    public function output()
    {
  
      require APPROOT . '/views/inc/header.php';
      
      $action = URLROOT . 'users/Viewusers';
      $text = <<<EOT
      <form action="$action" method="post">
           
      EOT;
?>

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
                                                  <a class="table-link danger" href="<?php echo URLROOT . 'pages/Deleteproduct'; ?>">
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
                                                  <a class="table-link danger" href="<?php echo URLROOT . 'pages/Deleteproduct'; ?>">
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
                                                  <a class="table-link danger" href="<?php echo URLROOT . 'pages/Deleteproduct'; ?>">
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
                                                  <a class="table-link danger" href="<?php echo URLROOT . 'pages/Deleteproduct'; ?>">
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
