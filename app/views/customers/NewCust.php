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
    $action = URLROOT . 'customers/OldCust';
    ?>
    <a class="back" href="<?php echo URLROOT . 'pages/User'; ?>">Back</a>
    <?php
    $text = <<<EOT

    <div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
    <h1>New Customer</h1>
				</div>
			</div> 
			<div class="main-login main-center">

    <form action="$action"class="form-horizontal" method="post">
EOT;
    echo $text;
    $this->printName();
    $this->printPhone_number();
    $this->printAdress();
    $this->printType();
    $text = <<<EOT
    <div class="form-group">
    <div class="cols-sm-10">
      <div class="input-group">
          <input type="submit" value="Register" class="form-control btn btn-lg btn-primary btn-block">
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

    $this->printInput('text', 'name', $val, $err, $valid);
  }
  private function printPhone_number()
  {
    $val = $this->model->getPhone_number();
    $err = $this->model->getPhone_numberErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'phone_number', $val, $err, $valid);
  }

  private function printAdress()
  {
    $val = $this->model->getAddress();
    $err = $this->model->getAddressErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('textarea', 'address', $val, $err, $valid);
  }
  private function printType()
  {
    $val = $this->model->getType();
    $err = $this->model->getTypeErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'type', $val, $err, $valid);
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
      <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val">
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
