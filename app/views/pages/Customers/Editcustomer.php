<head>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Addemployee.css">
</head>

<?php
class Editcustomer extends view
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
    $action = URLROOT . 'customers/Editcustomer';
    $text = <<<EOT

  <div class="container">
  <div class="row main">
    <div class="panel-heading">
      <div class="panel-title text-center">
  <h1>Edit customer</h1>
      </div>
    </div> 
    <div class="main-login main-center">
  <form action="$action"class="form-horizontal" method="post" name="myForm" onsubmit="return(validate());">
  <span id="demo"></span>
        <br>
EOT;
    echo $text;
    $this->printName();
    $this->printphone_number();
    $this->printaddress();
    $this->printID();
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
    $val = $this->model->getcustomerName($id);
    $err = $this->model->getNameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'name', $val, $err, $valid);
  }
  private function printphone_number()
  {
    $id = $_GET['id'];
    $val = $this->model->getcustomerphone_number($id);
    $err = $this->model->getphone_numberErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'phone_number', $val, $err, $valid);
  }

  private function printaddress()
  {
    $id = $_GET['id'];
    $val = $this->model->getcustomeraddress($id);
    $err = $this->model->getaddressErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'address', $val, $err, $valid);
  }

  private function printID()
  {
    $val = $id = $_GET['id'];
    $err = $this->model->getnameErr();
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
  var special = new RegExp(
    "^(?=.*[-+_!@#$%^&*.,?]).+$"
  );

  function validate() {

    //////NAME
    if (document.myForm.name.value.length == "") {
      document.getElementById("demo").innerHTML = "Please provide a name"
      return false;
    } else if (!(/^[a-zA-Z]+$/.test(document.myForm.name.value))) {
      document.getElementById("demo").innerHTML = "name must contain letters only"
      return false;
    }

    //////phone number
    if (document.myForm.phone_number.value == "") {
      document.getElementById("demo").innerHTML = "Please provide Phone number"
      return false;
    } else if (document.myForm.phone_number.value.length > 11) {
      document.getElementById("demo").innerHTML = "phone number is not valid"
      return false;
    }else if (document.myForm.phone_number.value[0] != "0") {
      document.getElementById("demo").innerHTML = "phone number is not valid"
      return false;
    }
    // || document.myForm.phone_number.value[0] != "0"
    /////address
    if ((special.test(document.myForm.address.value))) {
      document.getElementById("demo").innerHTML = "address is not valid"
      return false;
    } else {
      document.getElementById("demo").innerHTML = "";
      return (true);

    }
  }

  //-->
</script>