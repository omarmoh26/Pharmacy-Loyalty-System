<head>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/form.css">
</head>

<?php
class Editpassword extends view
{
  public function output()
  {
    $title = $this->model->title;

    require APPROOT . '/views/inc/header.php';
    $this->printForm();
    require APPROOT . '/views/inc/footer.php';
  }

  private function printForm()
  {
    $action = URLROOT . 'pages/Editpassword';
    $text = <<<EOT

    <div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="texttt">
    <h1>Edit Password</h1>
				</div>
			</div> 
			<div class="main-login main-center">
    <form action="$action" name="myForm" class="form-horizontal" method="post" onsubmit="return(validate());">
    <span id="demo"></span>
        <br>
EOT;
    echo $text;
    $this->printoldPassword();
    $this->printnewPassword();
    $this->printConfirmPassword();
    $this->printID();
    $text = <<<EOT
    <div class="form-group">
    <div class="cols-sm-10">
          <input type="submit" value="Confirm" class="form-control btn btn-lg btn-primary btn-block">
          </div>
          <div class="message" id="message_name">
          </div>
        </div>
    </form>
   
EOT;
    echo $text;
  }

  private function printoldPassword()
  {
    $val = $this->model->getoldPassword();
    $err = $this->model->getoldPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    ?>
    <span id="old_password" class="-error"></span>
  <?php
    $this->printInput('password', 'old_password', $val, $err, $valid);
  }

  private function printnewPassword()
  {
    $val = $this->model->getnewPassword();
    $err = $this->model->getnewPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    ?>
    <span id="new_password" class="-error"></span>
  <?php
    $this->printInput('password', 'new_password', $val, $err, $valid);
  }
  private function printConfirmPassword()
  {
    $val = $this->model->getConfirmPassword();
    $err = $this->model->getConfirmPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    ?>
    <span id="confirm_password" class="-error"></span>
  <?php
    $this->printInput('password', 'confirm_password', $val, $err, $valid);
  }
  private function printID()
  {
    $val =  $_SESSION['user_id'];
    $err = $this->model->getUsernameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('hidden', 'id', $val, $err, $valid);
  }

  private function printInput($type, $fieldName, $val, $err, $valid)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    if ($fieldName != "id") {
      $text = <<<EOT
          <div class="form-group">
                  <div class="cols-sm-10">
                    <div class="input-group">
                  
            <label for="$fieldName"> $label:</label>
            <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val" required="" onkeyup="return(validate());">
            <span class="invalid-feedback">$err</span>
            </div>
            <div class="message" id="message_mail">
            </div>
          </div>
        </div>
      EOT;
      echo $text;
    } else {
      $text = <<<EOT
          <div class="form-group">
                  <div class="cols-sm-10">
                    <div class="input-group">
                  
            <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val" required="">
            <span class="invalid-feedback">$err</span>
            </div>
            <div class="message" id="message_mail">
            </div>
          </div>
        </div>
      EOT;
      echo $text;
    }
  }
}
?>
<script type="text/javascript">
  // Form validation code will come here.
  var pattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[-+_!@#$%^&*.,?]).+$");
  var upp = new RegExp(
    "^(?=.*[A-Z]).+$"
  );
  var loww = new RegExp(
    "^(?=.*[a-z]).+$"
  );
  var digitt = new RegExp(
    "^(?=.*\\d).+$"
  );

  function validate() {

    ////// oldpassword 
    if (document.myForm.old_password.value.length < 8 ||
      !(upp.test(document.myForm.old_password.value)) ||
      !(loww.test(document.myForm.old_password.value)) ||
      !(digitt.test(document.myForm.old_password.value))) {

      document.getElementById("old_password").innerHTML = "Wrong old password "
      return false;
    }
    else{
      document.getElementById("old_password").innerHTML = "";
    }
    //////new PASSWORD
    if (document.myForm.new_password.value == "") {

      document.getElementById("new_password").innerHTML = "Please enter a new password "
      return false;
    } else if (document.myForm.new_password.value.length < 8) {

      document.getElementById("new_password").innerHTML = "Please enter an 8 characters password "
      return false;
    }
    //////digit,uppercase,lowercase
    else if (!(upp.test(document.myForm.new_password.value))) {
      document.getElementById("new_password").innerHTML = "password must contain an uppercase letter "
      return false;
    } else if (!(loww.test(document.myForm.new_password.value))) {
      document.getElementById("new_password").innerHTML = "password must contain a lowercase letter "
      return false;
    } else if (!(digitt.test(document.myForm.new_password.value))) {
      document.getElementById("new_password").innerHTML = "password must contain a digit "
      return false;
    }
    else{
      document.getElementById("new_password").innerHTML = "";
    }
    //////
    if (document.myForm.new_password.value != document.myForm.confirm_password.value) {
      document.getElementById("confirm_password").innerHTML = "Password don't match "
      return false;
    } 
    else {
      document.getElementById("confirm_password").innerHTML = "";
    }

    if (document.getElementById("old_password").innerHTML == "" &&
      document.getElementById("new_password").innerHTML == "" &&
      document.getElementById("confirm_password").innerHTML == "") {
      return true;
    }
  }

  //-->
</script>