<?php
class Users extends Controller
{
    public function register()
    {
        $registerModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $registerModel->setName(trim($_POST['name']));
            $registerModel->setUsername(trim($_POST['username']));
            $registerModel->setPassword(trim($_POST['password']));
            $registerModel->setConfirmPassword(trim($_POST['confirm_password']));

            //validation
            if (empty($registerModel->getName())) {
                $registerModel->setNameErr('Please enter a name');
            }
            if (empty($registerModel->getUsername())) {
                $registerModel->setUsernameerr('Please enter an a username');
            } elseif ($registerModel->usernameExist($_POST['username'])) {
                $registerModel->setUsernameerr('username is already registered');
            }
            if (empty($registerModel->getPassword())) {
                $registerModel->setPasswordErr('Please enter a password');
            } elseif (strlen($registerModel->getPassword()) < 4) {
                $registerModel->setPasswordErr('Password must contain at least 4 characters');
            }

            if ($registerModel->getPassword() != $registerModel->getConfirmPassword()) {
                $registerModel->setConfirmPasswordErr('Passwords do not match');
            }

            if (
                empty($registerModel->getNameErr()) &&
                empty($registerModel->getUsernameerr()) &&
                empty($registerModel->getPasswordErr()) &&
                empty($registerModel->getConfirmPasswordErr())
            ) {
                //Hash Password
               // $registerModel->setPassword(password_hash($registerModel->getPassword(), PASSWORD_DEFAULT));

                if ($registerModel->signup()) {
                    //header('location: ' . URLROOT . 'users/login');
                    flash('register_success', 'You have registered successfully');
                    redirect('users/login');
                } else {
                    die('Error in sign up');
                }
            }
        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'users/Register.php';
        require_once $viewPath;
        $view = new Register($this->getModel(), $this);
        $view->output();
    }
    public function addemployee()
    {
        $AddemployeeModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $AddemployeeModel->setName(trim($_POST['name']));
            $AddemployeeModel->setUsername(trim($_POST['username']));
            $AddemployeeModel->setPassword(trim($_POST['password']));
            $AddemployeeModel->setConfirmPassword(trim($_POST['confirm_password']));

            //validation
            if (empty($AddemployeeModel->getName())) {
                $AddemployeeModel->setNameErr('Please enter a name');
            }
            if (empty($AddemployeeModel->getUsername())) {
                $AddemployeeModel->setUsernameerr('Please enter an a username');
            } elseif ($AddemployeeModel->usernameExist($_POST['username'])) {
                $AddemployeeModel->setUsernameerr('username is already Addemployeeed');
            }
            if (empty($AddemployeeModel->getPassword())) {
                $AddemployeeModel->setPasswordErr('Please enter a password');
            } elseif (strlen($AddemployeeModel->getPassword()) < 4) {
                $AddemployeeModel->setPasswordErr('Password must contain at least 4 characters');
            }

            if ($AddemployeeModel->getPassword() != $AddemployeeModel->getConfirmPassword()) {
                $AddemployeeModel->setConfirmPasswordErr('Passwords do not match');
            }

            if (
                empty($AddemployeeModel->getNameErr()) &&
                empty($AddemployeeModel->getUsernameerr()) &&
                empty($AddemployeeModel->getPasswordErr()) &&
                empty($AddemployeeModel->getConfirmPasswordErr())
            ) {
                //Hash Password
               // $AddemployeeModel->setPassword(password_hash($AddemployeeModel->getPassword(), PASSWORD_DEFAULT));

                if ($AddemployeeModel->signup()) {
                    //header('location: ' . URLROOT . 'users/login');
                    flash('Adding employee', 'You have Added an employee successfully');
                    redirect('pages/Admin');
                } else {
                    die('Error in sign up');
                }
            }
        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'users/Addemployee.php';
        require_once $viewPath;
        $view = new Addemployee($this->getModel(), $this);
        $view->output();
    }
    public function login()
    {
        $userModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $userModel->setUsername(trim($_POST['username']));
            $userModel->setPassword(trim($_POST['password']));

            //validate login form
            if (empty($userModel->getUsername())) {
                $userModel->setUsernameerr('Please enter a Username');
            } elseif (!($userModel->usernameExist($_POST['username']))) {
                $userModel->setUsernameerr('No user found');
            }

            if (empty($userModel->getPassword())) {
                $userModel->setPasswordErr('Please enter a password');
            } elseif (strlen($userModel->getPassword()) < 4) {
                $userModel->setPasswordErr('Password must contain at least 4 characters');
            }

            // If no errors
            if (
                empty($userModel->getUsernameerr()) &&
                empty($userModel->getPasswordErr())
            ) {
                //Check login is correct
                $loggedUser = $userModel->login();
                if ($loggedUser) {
                    //create related session variables
                    $this->createUserSession($loggedUser);
                    die('Success log in User');
                } else {
                    $userModel->setPasswordErr('Password is not correct');
                }
            }
        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'users/Login.php';
        require_once $viewPath;
        $view = new Login($userModel, $this);
        $view->output();
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['type'] = $user->type;
        //header('location: ' . URLROOT . 'pages');
        if($user->type==2)
            redirect('pages/User');
        else if($user->type==1)
            redirect('pages/Admin');
        else
            redirect('pages');
    }

    public function logout()
    {
        echo 'logout called';
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
}
