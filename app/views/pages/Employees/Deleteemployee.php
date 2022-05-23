<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Deleteemployee.css"></head>
<a class="back" href="<?php echo URLROOT . 'users/Viewusers'; ?>">Back</a>

<?php
class Deleteemployee extends View
{
  
    public function output()
    {
  
      require APPROOT . '/views/inc/header.php';
      
      $action = URLROOT . 'pages/Viewusers';
      $text = <<<EOT
      <form action="$action" method="post">
      
      <input type="submit" name="submit" value="Delete">
      
      EOT;
      ?>
        <div class="w">
          <div class="midtext">
          <p1>Are you sure you want to delete this user?</p1>
          </div>
          <a class="cancel" href="<?php echo URLROOT . 'pages/Viewemployees'; ?>">Cancel</a>

        </div>
      <?php
      <<<EOT
      </form>
    
      EOT;
      echo $text;
      require APPROOT . '/views/inc/footer.php';
    }
}