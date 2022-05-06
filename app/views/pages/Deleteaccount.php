<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Deleteemployee.css"></head>
<a class="cancel" href="<?php echo URLROOT . 'pages/Admin'; ?>">Cancel</a>

<?php
class Deleteaccount extends View
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
            <div class="midtext2">
                <p1>Are you sure you want to delete this Account?</p1>
            </div>
        </div>
        <a class="back" href="<?php echo URLROOT . 'pages/Admin'; ?>">Back</a>
      <?php
      <<<EOT
      </form>
    
      EOT;
      echo $text;
      require APPROOT . '/views/inc/footer.php';
    }
}

