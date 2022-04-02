<?php
class Login extends view
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
    $action = URLROOT . 'users/login';
    $registerUrl = URLROOT . 'users/register';

    $text = <<<EOT
    <div class="row">
    <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
    <h2>Login</h2>
    <form action="$action" method="post">
EOT;

    echo $text;
    $this->printUsername();
    $this->printPassword();

    $text = <<<EOT
    <div class="container">
      <div class="row mt-4">
        <div class="col">
          <input type="submit" value="Login" class="form-control btn btn-lg btn-primary btn-block">
        </div>
        <div class="col">
          <a href="$registerUrl" class="form-control btn btn-lg btn-block">New User, Sign up</a>
        </div>
      </div>
      </div>
    </form>
    </div>
    </div>
    </div>
EOT;
    echo $text;
  }

  private function printUsername()
  {
    $val = $this->model->getUsername();
    $err = $this->model->getUsernameerr();
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

  private function printInput($type, $fieldName, $val, $err, $valid)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
    <div class="form-group">
      <label for="$fieldName"> $label: <sup>*</sup></label>
      <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val" required="">
      <span class="invalid-feedback">$err</span>
    </div>
EOT;
    echo $text;
  }
}