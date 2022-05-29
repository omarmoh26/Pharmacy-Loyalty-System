<head>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Deleteemployee.css">
</head>

<?php
class Deleteaccount extends View
{

  public function output()
  {

    require APPROOT . '/views/inc/header.php';

    $action = URLROOT . 'users/logout';

    $text = <<<EOT
    
      <form action="$action" onsubmit="return(validate());" name="myForm" method="post">
      
      <input type="submit" name="submit" value="Delete";>
      
      EOT;
?>
    <p id="demo"></p>
    <div class="w">
      <div class="midtext2">
        <p1>Are you sure you want to delete this Account?</p1>
      </div>
    </div>
    <a class="cancel" href="<?php echo URLROOT . 'pages/Admin'; ?>">Cancel</a>
<?php
    <<<EOT
      </form>
    
      EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>
<script>
function validate() {
  let text = "To confirm press [ok]";
  if (confirm(text) == true) {
    text = "Account Deleted";
    
  } 
  else {
    return false;
  }
  document.getElementById("demo").innerHTML = text;
}
</script>