<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Viewusers.css"></head>
<a class="back" href="<?php echo URLROOT . 'pages/Admin'; ?>">Back</a>
<a class="leftbar" href="<?php echo URLROOT . 'users/Addemployee'; ?>">add employees</a>
<?php
class Viewcustomer extends View
{
  
    public function output()
    {
  
      require APPROOT . '/views/inc/header.php';
      
      $action = URLROOT . 'pages/Viewcustomer';
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
                                                <th><span>ID</span></th>
                                                <th><span>Name</span></th>
                                                <th><span>Phone Number</span></th>
                                                <th><span>Address</span></th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                   dqdqwdqw
                                                </td>
                                                <td>
                                                    11111111111
                                                </td>
                                                <td>
                                                    domqdoimwq kqwdnmoiwq dqwijdmowiqmd wiodjmwqiodjio
                                                </td>
                                                <td style="width: 20%;">
                                                    <a class="table-link text-info" href="<?php echo URLROOT . 'pages/Editemployee'; ?>">
                                                        <span class="fa-stack">
                                                            <i class="fa fa-square fa-stack-2x"></i>
                                                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                    </a>
                                                <a class="table-link danger" href="<?php echo URLROOT . 'pages/Deleteemployee'; ?>">
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