<head>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/form.css">
</head>

<?php
class Addemployee extends view
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
    $action = URLROOT . 'users/addemployee';
    $text = <<<EOT

    <div class="container">
   
		<div class="row main">
			<div class="panel-heading">
				<div class="texttt">
    <h1>Add Employee</h1>
    
				</div>
			</div> 
			<div class="main-login main-center">
    <form action="$action" name="myForm" class="form-horizontal" method="post" onsubmit="return(validate());" >
    
EOT;
    echo $text;
    $this->printName();
    $this->printUsername();
    $this->printPassword();
    $this->printConfirmPassword();
    $text = <<<EOT
    <div class="form-group">
    <div class="cols-sm-10">
    <br>
          <input type="submit" value="Add" class="form-control btn btn-lg btn-primary btn-block">
          
          </div>
          <div class="message" id="message_name">
          </div>
        </div>
    </form>
   
EOT;
    echo $text;
  }

  private function printName()
  {
    $val = $this->model->getName();
    $err = $this->model->getNameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

?>
    <span id="name" class="-error"></span>
  <?php
    $this->printInput('text', 'name', $val, $err, $valid);
  }
  private function printUsername()
  {
    $val = $this->model->getUsername();
    $err = $this->model->getUsernameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

  ?>
    <span id="username" class="-error"></span>
  <?php
    $this->printInput('text', 'username', $val, $err, $valid);
  }

  private function printPassword()
  {
    $val = $this->model->getPassword();
    $err = $this->model->getPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

  ?>
    <span id="password" class="-error"></span>
  <?php
    $this->printInput('password', 'password', $val, $err, $valid);
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

  private function printInput($type, $fieldName, $val, $err, $valid)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
    <div class="form-group">
						<div class="cols-sm-10">
							<div class="input-group">
						
      <label for="$fieldName"> $label:</label>
      <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val" onkeyup="validate();">
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

    //////NAME
    if (document.myForm.name.value.length == "") {
      document.getElementById("name").innerHTML = "Please provide your name";
      return false;
    } 
     if (!(/^[a-zA-Z]+$/.test(document.myForm.name.value))) {
      document.getElementById("name").innerHTML = "name must contain letters only";
      return false;
    } else {
      document.getElementById("name").innerHTML = "";
    }

    //////USERNAME
    if (document.myForm.username.value == "") {
      document.getElementById("username").innerHTML = "Please provide your username";
      return false;
    }  if (document.myForm.username.value.toUpperCase() == "ADMIN") {
      document.getElementById("username").innerHTML = "Username canot be admin ";
      return false;
    } else {
      document.getElementById("username").innerHTML = "";
    }

    //////PASSWORD
    if (document.myForm.password.value == "") {

      document.getElementById("password").innerHTML = "Please enter a password ";
      return false;
    }  if (document.myForm.password.value.length < 8) {

      document.getElementById("password").innerHTML = "Please enter an 8 characters password ";
      return false;
    }
    //////digit,uppercase,lowercase
     if (!(upp.test(document.myForm.password.value))) {
      document.getElementById("password").innerHTML = "password must contain an uppercase letter ";
      return false;
    }  if (!(loww.test(document.myForm.password.value))) {
      document.getElementById("password").innerHTML = "password must contain a lowercase letter ";
      return false;
    } if (!(digitt.test(document.myForm.password.value))) {
      document.getElementById("password").innerHTML = "password must contain a digit ";
      return false;
    }  {
      document.getElementById("password").innerHTML = "";
    }

    if (document.myForm.confirm_password.value == "") {
      document.getElementById("confirm_password").innerHTML = "Please enter a confirm password ";
      return false;
    }
     if (document.myForm.password.value != document.myForm.confirm_password.value) {
      document.getElementById("confirm_password").innerHTML = "Password doesnt match ";
      return false;
    } else {
      document.getElementById("confirm_password").innerHTML = "";
    }

    if (document.getElementById("name").innerHTML == "" &&
      document.getElementById("username").innerHTML == "" &&
      document.getElementById("password").innerHTML == "" &&
      document.getElementById("confirm_password").innerHTML == "") {
      return true;
    }
    //////
  }

  //-->
</script>