<?php
class Customers extends Controller
{
    public function newCust()
    {
        $registerModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $registerModel->setName(trim($_POST['name']));
            $registerModel->setPhone_number(trim($_POST['phone_number']));
            $registerModel->setAddress(trim($_POST['address']));

            //validation
            if (empty($registerModel->getName())) {
                $registerModel->setNameErr('Please enter a name');
            }
            if (empty($registerModel->getPhone_number())) {
                $registerModel->setPhone_numberErr('Please enter a phone number');
            } elseif ($registerModel->Phone_numberExist($_POST['phone_number'])) {
                $registerModel->setPhone_numberErr('Phone Number is already registered');
            }
            
            if (empty($registerModel->getAddress())) {
                $registerModel->setAddressErr('Please enter an address');
            }

            if (
                empty($registerModel->getNameErr()) &&
                empty($registerModel->getPhone_numberErr()) &&
                empty($registerModel->getAddressErr()) 
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
    public function oldCust()
    {
        $userModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $userModel->setPhone_number(trim($_POST['phone_number']));

            //validate login form
            if (empty($userModel->getPhone_number())) {
                $userModel->setPhone_numberErr('Please enter a Phone Number');
            } elseif (!($userModel->Phone_numberExist($_POST['phone_number']))) {
                $userModel->setPhone_numberErr('No phone number found');
            }

            // If no errors
            if (
                empty($userModel->getPhone_numberErr())
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
        $viewPath = VIEWS_PATH . 'customers/OldCust.php';
        require_once $viewPath;
        $view = new OldCust($userModel, $this);
        $view->output();
    }

    public function createCustSession($customer)
    {
        $_SESSION['customer_id'] = $customer->id;
        $_SESSION['customer_name'] = $customer->name;
        $_SESSION['customer_address'] = $customer->address;
        //header('location: ' . URLROOT . 'pages');
        redirect('pages');
    }

    public function logout()
    {
        echo 'logout called';
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        unset($_SESSION['customer_address']);
        session_destroy();
        redirect('customers/OldCust');
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['customer_id']);
    }
}
