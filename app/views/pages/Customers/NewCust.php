<link rel="stylesheet" href="<?php echo URLROOT; ?>css/form.css">

<?php
class NewCust extends view
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
    $action = URLROOT . 'customers/newcust';
    $text = <<<EOT

    <div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
    <h1>New Customer</h1>
				</div>
			</div> 
			<div class="main-login main-center">

      <form action="$action"class="form-horizontal" method="post" name="myForm" onsubmit="return(validate());">
   
EOT;
    echo $text;
    $this->printName();
    $this->printPhone_number();
    $this->printAddress();
    $text = <<<EOT
    <div class="form-group">
    <div class="cols-sm-10">
      <div class="input-group">
          <input type="submit" value="Add" class="form-control btn btn-lg btn-primary btn-block">
          </div>
          <div class="message" id="message_name">
          </div>
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
  private function printPhone_number()
  {
    $val = $this->model->getPhone_number();
    $err = $this->model->getPhone_numberErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    ?>
    <span id="phone_number" class="-error"></span>
  <?php
    $this->printInput('text', 'phone_number', $val, $err, $valid);
  }

  private function printAddress()
  {
    $val = $this->model->getAddress();
    $err = $this->model->getAddressErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    ?>
    <span id="address" class="-error"></span>
<?php
    $this->printInput('textarea', 'address', $val, $err, $valid);
  }

  private function printInput($type, $fieldName, $val, $err, $valid)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
    <div class="form-group">
						<div class="cols-sm-10">
							<div class="input-group">
							
      <label for="$fieldName"> $label: </label>
      <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val"  onkeyup="return(validate());">
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
  var special = new RegExp(
    "^(?=.*[-+_!@#$%^&*.,?]).+$"
  );

  function validate() {

    //////NAME
    if (document.myForm.name.value.length == "") {
      document.getElementById("name").innerHTML = "Please provide a name"
      return false;
    } else if (!(/^[a-zA-Z]+$/.test(document.myForm.name.value))) {
      document.getElementById("name").innerHTML = "name must contain letters only"
      return false;
    } else {
      document.getElementById("name").innerHTML = "";
    }

    //////phone number
    if (document.myForm.phone_number.value == "") {
      document.getElementById("phone_number").innerHTML = "Please provide Phone number"
      return false;
    }
    else if ((upp.test(document.myForm.phone_number.value))||(loww.test(document.myForm.phone_number.value))||(special.test(document.myForm.phone_number.value))) {
      document.getElementById("phone_number").innerHTML = "phone number must contain numbers only"
      return false;
    }
    else if (document.myForm.phone_number.value.length > 11) {
      document.getElementById("phone_number").innerHTML = "phone number is not valid"
      return false;
    } else if (document.myForm.phone_number.value[0] != "0") {
      document.getElementById("phone_number").innerHTML = "phone number is not valid"
      return false;
    } else {
      document.getElementById("phone_number").innerHTML = "";
    }
    /////address
    if ((special.test(document.myForm.address.value))) {
      document.getElementById("address").innerHTML = "address is not valid"
      return false;
    } else {
      document.getElementById("address").innerHTML = "";
    }
    if (document.getElementById("name").innerHTML == "" &&
      document.getElementById("phone_number").innerHTML == "" &&
      document.getElementById("address").innerHTML == "") {
      return true;
    }
  }

  //-->
</script>