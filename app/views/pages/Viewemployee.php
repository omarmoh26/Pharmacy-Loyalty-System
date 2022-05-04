<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Viewemployee.css"></head>
<a class="back" href="<?php echo URLROOT . 'pages/Admin'; ?>">Back</a>

<?php
class Viewemployee extends View
{
  
    public function output()
    {
  
      require APPROOT . '/views/inc/header.php';
      
      $action = URLROOT . 'pages/Admin';
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
                                        <th><span>User</span></th>
                                        <th><span>Created</span></th>
                                        <th class="text-center"><span>Status</span></th>
                                        <th><span>Email</span></th>
                                        <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="">
                                                <a href="#" class="user-link">Full name 1</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-default">pending</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_3.jpg" alt="">
                                                <a href="#" class="user-link">Full name 2</a>
                                                <span class="user-subhead">Admin</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-success">Active</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Full name 3</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-danger">inactive</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Full name 3</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-danger">inactive</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Full name 3</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-danger">inactive</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Full name 3</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-danger">inactive</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Full name 3</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-danger">inactive</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Full name 3</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-danger">inactive</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Full name 3</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-danger">inactive</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Full name 3</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-danger">inactive</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Full name 3</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-danger">inactive</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Full name 3</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-danger">inactive</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Full name 3</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-danger">inactive</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
                                        <tr>
                                            <td>
                                                <img src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Full name 3</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-danger">inactive</span>
                                            </td>
                                            <td>
                                                <a href="#">marlon@brando.com</a>
                                            </td>
                                            <td style="width: 20%;">
                                                
                                                <a href="#" class="table-link  text-info">
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
