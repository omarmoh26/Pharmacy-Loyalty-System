<head>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Addemployee.css">
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
    <span id="demo"></span>
    <br>
EOT;
    echo $text;
    $this->printName();
    $this->printUsername();
    $this->printPassword();
    $this->printConfirmPassword();
    $text = <<<EOT
    <div class="form-group">
    <div class="cols-sm-10">
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

    $this->printInput('text', 'name', $val, $err, $valid);
  }
  private function printUsername()
  {
    $val = $this->model->getUsername();
    $err = $this->model->getUsernameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'username', $val, $err, $valid);
  }

  private function printPassword()
  {
    $val = $this->model->getPassword();
    $err = $this->model->getPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('password', 'password', $val, $err, $valid);
  }
  private function printConfirmPassword()
  {
    $val = $this->model->getConfirmPassword();
    $err = $this->model->getConfirmPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

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
      <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val" onkeyup="return(validate());">
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
      document.getElementById("demo").innerHTML ="Please provide your name" 
      return false;
    } 
    else if (!(/^[a-zA-Z]+$/.test(document.myForm.name.value))) {
      document.getElementById("demo").innerHTML ="name must contain letters only"  
      return false;
    }
    //////USERNAME


    if (document.myForm.username.value == "") {
      document.getElementById("demo").innerHTML ="Please provide your username" 
      return false;
    } 
    else if (document.myForm.username.value.toUpperCase() == "ADMIN") {
      document.getElementById("demo").innerHTML ="Username canot be admin "
      return false;
    }
    //////PASSWORD
    if (document.myForm.password.value == "") {

      document.getElementById("demo").innerHTML ="Please enter a password "
      return false;
    } 
    else if (document.myForm.password.value.length < 8) {

      document.getElementById("demo").innerHTML ="Please enter an 8 characters password "
      return false;
    } 
    //////digit,uppercase,lowercase
    else if (!(upp.test(document.myForm.password.value))) {
      document.getElementById("demo").innerHTML ="password must contain an uppercase letter "
      return false;
    }
    else if (!(loww.test(document.myForm.password.value))) {
      document.getElementById("demo").innerHTML ="password must contain a lowercase letter "
      return false;
    }
    else if (!(digitt.test(document.myForm.password.value))) {
      document.getElementById("demo").innerHTML ="password must contain a digit "
      return false;
    }
    //////
    else if (document.myForm.password.value != document.myForm.confirm_password.value) {
      document.getElementById("demo").innerHTML ="Password don't match "
      return false;
    }
    else{
    document.getElementById("demo").innerHTML = "";
    return (true);
    
    }
  }
  
  //-->
</script>