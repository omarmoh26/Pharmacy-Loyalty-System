<head><link rel="stylesheet" href="<?php echo URLROOT; ?>css/Addemployee.css"></head>

<?php
class Editemployee extends view
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
        $action = URLROOT . 'users/Editemployee';
        $text = <<<EOT

    <div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
    <h1>Edit Employee</h1>
				</div>
			</div> 
			<div class="main-login main-center">
    <form action="$action" name="myForm" class="form-horizontal" method="post" onsubmit="return(validate());">
    <span id="demo"></span>
        <br>
EOT;
    echo $text;
    $this->printName();
    $this->printUsername();
    $this->printID();
    // $this->printPassword();
    // $this->printConfirmPassword();
    $text = <<<EOT
    <div class="form-group">
    <div class="cols-sm-10">
          <input type="submit" value="Apply Changes" class="form-control btn btn-lg btn-primary btn-block" >
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
    $id = $_GET['id'];
    $val = $this->model->getEmployeeName($id);
    $err = $this->model->getNameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'name', $val, $err, $valid);
  }
  private function printUsername()
  {
    $id = $_GET['id'];
    $val = $this->model->getEmployeeUserName($id);
    $err = $this->model->getUsernameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'username', $val, $err, $valid);
  }
  private function printID()
  {
    $val = $_GET['id'];
    $err = $this->model->getUsernameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('hidden', 'id', $val, $err, $valid);
  }


  private function printInput($type, $fieldName, $val, $err, $valid)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    if($fieldName!="id"){
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
    }
    else{
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
      document.getElementById("demo").innerHTML ="Please provide a name" 
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
    else{
    document.getElementById("demo").innerHTML = "";
    return (true);
    
    }
  }
  
  //-->
</script>