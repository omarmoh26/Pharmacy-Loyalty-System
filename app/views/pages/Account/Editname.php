<head>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/form.css">
</head>

<?php
class Editname extends view
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
    $action = URLROOT . 'pages/Editname';
    $text = <<<EOT
        
    <div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="texttt">
    <h1>Edit Name</h1>
				</div>
			</div> 
			<div class="main-login main-center">
    <form action="$action"name="myForm" class="form-horizontal" method="post" onsubmit="return(validate());">
EOT;
    echo $text;
    $this->printAdminName();
    $this->printAdminUsername();
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


  private function printAdminName()
  {
    $id = $_SESSION['user_id'];
    $val = $this->model->getAdminName($id);
    $err = $this->model->getNameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    //echo "$_SESSION['id']";
    ?>
    <span id="name" class="-error"></span>
  <?php
    $this->printInput('text', 'name', $val, $err, $valid);
  }
  private function printAdminUsername()
  {
    $id =  $_SESSION['user_id'];
    $val = $this->model->getAdminUserName($id);
    $err = $this->model->getUsernameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    ?>
    <span id="username" class="-error"></span>
  <?php
    $this->printInput('text', 'username', $val, $err, $valid);
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

    //////NAME
    if (document.myForm.name.value.length == "") {
      document.getElementById("name").innerHTML = "Please provide a name"
      return false;
    } 
    else if (!(/^[a-zA-Z]+$/.test(document.myForm.name.value))) {
      document.getElementById("name").innerHTML = "name must contain letters only"
      return false;
    } 
    else {
      document.getElementById("name").innerHTML = "";
    }
    //////USERNAME
    if (document.myForm.username.value == "") {
      document.getElementById("username").innerHTML = "Please provide your username";
      return false;
    } 
    else {
      document.getElementById("username").innerHTML = "";
    } 
    
    if (document.getElementById("name").innerHTML == "" &&
      document.getElementById("username").innerHTML == "") {
      return true;
    }
  }

  //-->
</script>