<?php
class Customers extends Controller
{
    public function newCust()
    {
        $registerModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $registerModel->setName(trim($_POST['name']));
            $registerModel->getPhone_number(trim($_POST['phone_number']));
            $registerModel->setAddress(trim($_POST['address']));
            $registerModel->setType(trim($_POST['type']));

            //validation
            if (empty($registerModel->getName())) {
                $registerModel->setNameErr('Please enter a name');
            }
            if (empty($registerModel->getPhone_number())) {
                $registerModel->setPhone_numberErr('Please enter a phone number');
            } elseif ($registerModel->Phone_numberExist($_POST['username'])) {
                $registerModel->setPhone_numberErr('Phone Number is already registered');
            }
            
            if (empty($registerModel->getAddress())) {
                $registerModel->setAddressErr('Please enter an address');
            }
            if (empty($registerModel->getType())) {
                $registerModel->setTypeErr('Please enter a Type');
            } elseif (strlen($registerModel->getType()) !=1) {
                $registerModel->setPasswordErr('Type is only one number');
            }

            if (
                empty($registerModel->getNameErr()) &&
                empty($registerModel->getPhone_numberErr()) &&
                empty($registerModel->getAddressErr()) &&
                empty($registerModel->getTypeErr())
            ) {
                //Hash Password
               // $registerModel->setPassword(password_hash($registerModel->getPassword(), PASSWORD_DEFAULT));

                if ($registerModel->signup()) {
                    //header('location: ' . URLROOT . 'users/login');
                    flash('register_success', 'You have registered successfully');
                    redirect('customers/OldCust');//change
                } else {
                    die('Error in sign up');
                }
            }
        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'customers/NewCust.php';
        require_once $viewPath;
        $view = new NewCust($this->getModel(), $this);
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
                    $this->createCustSession($loggedUser);
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

    public function createCustSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['type'] = $user->type;
        //header('location: ' . URLROOT . 'pages');
        if($user->type==2)
            redirect('pages/User');
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
