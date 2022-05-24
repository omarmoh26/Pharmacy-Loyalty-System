<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Deleteemployee.css"></head>
<a class="back" href="<?php echo URLROOT . 'pages/Viewemployees'; ?>">Back</a>

<?php
class Deleteemployee extends View
{
  
    public function output()
    {
      require APPROOT . '/views/inc/header.php';
      
      $action = URLROOT . 'users/Deleteemployee';
      $text = <<<EOT
      <form action="$action" class="form-horizontal" method="post">
      
      <input type="submit" name="submit" value="Delete">
      
      EOT;
      ?>
        <div class="w">
          <div class="midtext">
          <p1>Are you sure you want to delete this user?</p1>
          </div>
          <a class="cancel" href="<?php echo URLROOT . 'users/Viewemployees'; ?>">Cancel</a>

        </div>
      <?php
      $this->model->DeleteEmployee($_GET['id']);
      <<<EOT
      </form>
    
      EOT;
      echo $text;
      require APPROOT . '/views/inc/footer.php';
    }
}