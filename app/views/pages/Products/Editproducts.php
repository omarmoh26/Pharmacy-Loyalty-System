<head>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/form.css">
</head>

<?php
class Editproducts extends view
{
  public function output()
  {

    require APPROOT . '/views/inc/header.php';
    $this->printForm();
    require APPROOT . '/views/inc/footer.php';
  }

  private function printForm()
  {
    $action = URLROOT . 'products/Editproducts';
    $text = <<<EOT

    <div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
    <h1>Edit products</h1>
				</div>
			</div> 
			<div class="main-login main-center">
    <form action="$action"class="form-horizontal" name="myForm" method="post" onsubmit="return(validate());">
EOT;
    echo $text;
    $this->printID();
    $this->printName();
    $this->printPrice();
    $this->printQuantity();

    $result = $this->model->getAllTypes();
?>
    <div class="form-group">
      <div class="cols-sm-10">
        <div class="input-group">
          <label for="Type"> Type:</label>
        </div>
        <span class="invalid-feedback"><?php $this->model->getPtypeErr(); ?></span>
        <select name="type" class="form-select" aria-label="Default select example" style="max-width:90%;">
          
      </div>
    </div>
    <?php
    while ($row = mysqli_fetch_array($result)) { 
        if($row['Type'] == $this->model->getproductType($_GET['id'])){
            ?>
            <option value="<?php echo $row['ID']; ?>" selected><?php echo $row['Type']; ?></option>
       <?php }else{?>
           <option value="<?php echo $row['ID']; ?>"><?php echo $row['Type']; ?></option>
           <?php }
        ?>


<?php }
    $text = <<<EOT
    </select><br>
    
    <div class="form-group">
    <div class="cols-sm-10">
          <input type="submit" value="Apply Changes" class="form-control btn btn-lg btn-primary btn-block">
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
    
    $val = $this->model->getproductName($_GET['id']);
    $err = $this->model->getNameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    ?>
    <span id="name" class="-error"></span>
  <?php
    $this->printInput('text', 'name', $val, $err, $valid);
  }
  private function printPrice()
  {
    $val = $this->model->getproductPrice($_GET['id']);
    $err = $this->model->getPriceErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    ?>
    <span id="price" class="-error"></span>
  <?php
    $this->printInput('text', 'price', $val, $err, $valid);
  }

  private function printQuantity()
  {
    $val = $this->model->getproductQuant($_GET['id']);
    $err = $this->model->getQuantityErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    ?>
    <span id="quantity" class="-error"></span>
  <?php
    $this->printInput('text', 'quantity', $val, $err, $valid);
  }

  private function printID()
  {
    $val = $_GET['id'];
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
            <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val" onkeyup="return(validate());">
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
      document.getElementById("name").innerHTML = "Please provide a name"
      return false;
    } 
    else {
      document.getElementById("name").innerHTML = "";
    }

    //////price
    if (document.myForm.price.value == "") {
      document.getElementById("price").innerHTML = "Please provide Price"
      return false;
    }  
    else if ((upp.test(document.myForm.price.value))||(loww.test(document.myForm.price.value))||(special.test(document.myForm.price.value))) {
      document.getElementById("price").innerHTML = "price must contain numbers only"
      return false;
    }
    else {
      document.getElementById("price").innerHTML = "";
    }

    /////address
    if (document.myForm.quantity.value == "") {
      document.getElementById("quantity").innerHTML = "Please provide quantity"
      return false;
    }  
    else if ((upp.test(document.myForm.quantity.value))||(loww.test(document.myForm.quantity.value))||(special.test(document.myForm.quantity.value))) {
      document.getElementById("quantity").innerHTML = "quantity must contain numbers only"
      return false;
    }
    else {
      document.getElementById("quantity").innerHTML = "";
    }

    if (document.getElementById("name").innerHTML == "" &&
      document.getElementById("price").innerHTML == "" &&
      document.getElementById("quantity").innerHTML == "") {
      return true;
    }
  }

  //-->
</script>
