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
                    redirect('Customers/oldcust');//change
                } else {
                    die('Error in sign up');
                }
            }
        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'pages/Customers/NewCust.php';
        require_once $viewPath;
        $view = new NewCust($this->getModel(), $this);
        $view->output();
    }

    public function oldCust()
    {
        $userModel = $this->getModel();
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'pages/Customers/OldCust.php';
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
        redirect('pages/Customers/OldCust');
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['customer_id']);
    }
    public function Editcustomer()
    {
        $EditcustomerModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $EditcustomerModel->setId(trim($_POST['id']));
            $EditcustomerModel->setName(trim($_POST['name']));
            $EditcustomerModel->setaddress(trim($_POST['address']));
            $EditcustomerModel->setPhone_number(trim($_POST['phone_number']));


            if (empty($EditcustomerModel->getName())) {
                $EditcustomerModel->setNameErr('Please enter a name');
            }
            
            //validate login form
            if (empty($EditcustomerModel->getPhone_number())) {
                $EditcustomerModel->setPhone_numbererr('Please enter a Phone number');

            } 
            // elseif (!($EditcustomerModel->Phone_numberExist($_POST['phone_number']))) {
            //     $EditcustomerModel->setPhone_numbererr('No Phone number found');
            // }

            // If no errors
            if (
                empty($EditcustomerModel->getPhone_numbererr()) &&
                empty($EditcustomerModel->getnameerr())
            ) {
                //Check login is correct
                if ($EditcustomerModel->ApplyCustEdit()) {
                    redirect('customers/oldcust');
                } else {
                    die('Error in sign up');
                }
            }
        }
        $viewPath = VIEWS_PATH . 'pages/Customers/Editcustomer.php';
        require_once $viewPath;
        $AdminView = new Editcustomer($this->getModel(), $this);
        $AdminView->output();
    }
    public function EditcustomerAdmin()
    {
        $EditcustomerModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $EditcustomerModel->setId(trim($_POST['id']));
            $EditcustomerModel->setName(trim($_POST['name']));
            $EditcustomerModel->setaddress(trim($_POST['address']));
            $EditcustomerModel->setPhone_number(trim($_POST['phone_number']));


            if (empty($EditcustomerModel->getName())) {
                $EditcustomerModel->setNameErr('Please enter a name');
            }
            
            //validate login form
            if (empty($EditcustomerModel->getPhone_number())) {
                $EditcustomerModel->setPhone_numbererr('Please enter a Phone number');

            } 
            // elseif (!($EditcustomerModel->Phone_numberExist($_POST['phone_number']))) {
            //     $EditcustomerModel->setPhone_numbererr('No Phone number found');
            // }

            // If no errors
            if (
                empty($EditcustomerModel->getPhone_numbererr()) &&
                empty($EditcustomerModel->getnameerr())
            ) {
                //Check login is correct
                if ($EditcustomerModel->ApplyCustEdit()) {
                    redirect('pages/Viewcustomers');
                } else {
                    die('Error in sign up');
                }
            }
        }
        $viewPath = VIEWS_PATH . 'pages/Customers/EditcustomerAdmin.php';
        require_once $viewPath;
        $AdminView = new Editcustomer($this->getModel(), $this);
        $AdminView->output();
    }
    public function Deletecustomer()
    {   
        redirect('customers/oldCust');
        $viewPath = VIEWS_PATH . 'pages/Customers/Deletecustomer.php';
        require_once $viewPath;
        $AdminView = new Deletecustomer($this->getModel(), $this);
        $AdminView->output();
    }
}
