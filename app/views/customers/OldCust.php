<?php
class OldCust extends view
{
  public function output()
  {
    $title = $this->model->title;

    require APPROOT . '/views/inc/header.php';
    flash('register_success');
    $this->printForm();
    require APPROOT . '/views/inc/footer.php';
  }

  private function printForm()
  {
    $action = URLROOT . 'pages/Order';

    $text = <<<EOT
    <div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
          <h1>Old Customer</h1>
				</div>
			</div> 
			<div class="main-login main-center">
    <form action="$action" method="post">
EOT;

    echo $text;
    $this->printPhone_number();

    $text = <<<EOT
    <div class="form-group">
    <div class="cols-sm-10">
          <input type="submit" value="Login" class="form-control btn btn-lg btn-primary btn-block" >
          </div>
          <div class="message" id="message_name">
          </div>
        </div>
      
    </form>
    
EOT;
    echo $text;
  }

  private function printPhone_number()
  {
    $val = $this->model->getPhone_number();
    $err = $this->model->getPhone_numberErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'phone_number', $val, $err, $valid);
  }
  
  private function printInput($type, $fieldName, $val, $err, $valid)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
    <div class="form-group">
    <div class="cols-sm-10">
      <div class="input-group">

      <label for="$fieldName"> $label: <sup>*</sup></label>
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
