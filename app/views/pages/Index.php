<?php
class Index extends View
{
  public function output()
  { header("Location: http://localhost/mvc/public/users/logout");
    exit();

    require APPROOT . '/views/inc/header.php';
  
    require APPROOT . '/views/inc/footer.php';
  }
}
