<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Deleteemployee.css"></head>
<a class="back" href="<?php echo URLROOT . 'users/Viewemployee'; ?>">Back</a>

<?php
class Deleteemployee extends View
{
  
    public function output()
    {
  
      require APPROOT . '/views/inc/header.php';
      
      $action = URLROOT . 'pages/Viewemployee';
      $text = <<<EOT
      <form action="$action" method="post">
      
      <input type="submit" name="submit" value="Delete">
      
      EOT;
      ?>
        <div class="wrapper">
          <div class="midtext">
          <p1>Are you sure you want to delete this user?</p1>
          </div>
          <a class="cancel" href="<?php echo URLROOT . 'pages/Viewemployee'; ?>">Cancel</a>

        </div>
      <?php
      <<<EOT
      </form>
    
      EOT;
      echo $text;
      require APPROOT . '/views/inc/footer.php';
    }
}