<?php
class User extends View
{
  public function output()
  {

    require APPROOT . '/views/inc/header.php';
    $title = $this->model->title;
    $action = URLROOT . 'pages/User';
    $text = <<<EOT
    <form action="$action" method="post">
    <div class="wrapper ">
    <input type="button" value="newcustomer" >
    <input type="button" value="oldcustomer" >
    </div>
    </form>
  
    EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>
