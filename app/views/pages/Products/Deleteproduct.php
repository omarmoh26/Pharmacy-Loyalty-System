<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Deleteemployee.css"></head>

<?php
class Deleteproduct extends View
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
            <div class="midtext2">
                <p1>Are you sure you want to delete this product?</p1>
            </div>
        </div>
        <a class="cancel" href="<?php echo URLROOT . 'pages/products'; ?>">Cancel</a>
      <?php
      $this->model->DeleteProduct($_GET['id']);
      <<<EOT
      </form>
    
      EOT;
      echo $text;
      require APPROOT . '/views/inc/footer.php';
    }
}

