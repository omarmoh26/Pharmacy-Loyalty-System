<?php
class Pages extends Controller
{

    public function index()
    {
        $viewPath = VIEWS_PATH . 'pages/Index.php';
        require_once $viewPath;
        $indexView = new Index($this->getModel(), $this);
        $indexView->output();
    }

   
	public function viewusers()
    {
        $viewPath = VIEWS_PATH . 'pages/viewusers.php';
        require_once $viewPath;
        $View = new ViewUsers($this->getModel(), $this);
        $View->output();
    }
    //done
    public function User()
    {
        $viewPath = VIEWS_PATH . 'pages/User.php';
        require_once $viewPath;
        $UserView = new User($this->getModel(), $this);
        $UserView->output();
    }

    public function Admin()
    {
        $viewPath = VIEWS_PATH . 'pages/Admin.php';
        require_once $viewPath;
        $AdminView = new Admin($this->getModel(), $this);
        $AdminView->output();
    }

    public function Order()
    {
        $viewPath = VIEWS_PATH . 'pages/Orders/Order.php';
        require_once $viewPath;
        $AdminView = new Order($this->getModel(), $this);
        $AdminView->output();
    }

    public function Checkout()
    {
        $viewPath = VIEWS_PATH . 'pages/Orders/Checkout.php';
        require_once $viewPath;
        $AdminView = new Checkout($this->getModel(), $this);
        $AdminView->output();
    }
    
    public function Editname()
    {
        $EditnameModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $EditnameModel->setId(trim($_POST['id']));
            $EditnameModel->setName(trim($_POST['name']));
            $EditnameModel->setUsername(trim($_POST['username']));
            

            if (empty($EditnameModel->getName())) {
                $EditnameModel->setNameErr('Please enter a name');
            }
            //validate login form
            if (empty($EditnameModel->getUsername())) {
                $EditnameModel->setUsernameerr('Please enter a Username');
            }

            if (
                empty($EditnameModel->getUsernameerr()) &&
                empty($EditnameModel->getnameerr())
                ) {
                    
                if ($EditnameModel->ApplyEdit()) {
                    $_SESSION['user_name'] = $EditnameModel->getName();
                    $_SESSION['user_username'] = $EditnameModel->getUsername();
                    redirect('pages/Admin');
                } else {
                    die('Error in sign up');
                }
            }
        }
        $viewPath = VIEWS_PATH . 'pages/Account/Editname.php';
        require_once $viewPath;
        $AdminView = new Editname($this->getModel(), $this);
        $AdminView->output();
    }

    public function Editpassword()
    {
        $EditpasswordModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $EditpasswordModel->setId(trim($_POST['id']));
            $EditpasswordModel->setoldPassword($_SESSION['user_password']);
            $EditpasswordModel->setnewPassword(trim($_POST['new_password']));
            $EditpasswordModel->setConfirmPassword(trim($_POST['confirm_password']));

        if ($EditpasswordModel->getoldPassword() != $_POST['old_password']) {
            $EditpasswordModel->setoldPasswordErr('Old password is wrong');
        }
        else{
            $EditpasswordModel->setoldPassword(trim($_POST['old_password']));
        }

        if (empty($EditpasswordModel->getoldPassword())) {
            $EditpasswordModel->setoldPasswordErr('Please enter an old password');
        }

        if (empty($EditpasswordModel->getnewPassword())) {
            $EditpasswordModel->setnewPasswordErr('Please enter a new password');
        } elseif (strlen($EditpasswordModel->getPassword()) < 4) {
            $EditpasswordModel->setPasswordErr('Password must contain at least 4 characters');
        }

        if ($EditpasswordModel->getnewPassword() != $EditpasswordModel->getConfirmPassword()) {
            $EditpasswordModel->setConfirmPasswordErr('Passwords do not match');
        }

        if (
            empty($EditpasswordModel->getoldPasswordErr()) &&
            empty($EditpasswordModel->getnewPasswordErr()) &&
            empty($EditpasswordModel->getConfirmPasswordErr())
        ) {
            //Hash Password
            // $registerModel->setPassword(password_hash($registerModel->getPassword(), PASSWORD_DEFAULT));

            if ($EditpasswordModel->newpass()) {
                $_SESSION['user_password'] = $EditpasswordModel->getnewPassword();
                redirect('pages/Admin');
            } else {
                die('Error in sign up');
            }
        }
    }

        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'pages/Account/Editpassword.php';
        require_once $viewPath;
        $view = new Editpassword($EditpasswordModel, $this);
        $view->output();
    }

    
    public function Deleteaccount()
    {
        $viewPath = VIEWS_PATH . 'pages/Account/Deleteaccount.php';
        require_once $viewPath;
        $AdminView = new Deleteaccount($this->getModel(), $this);
        $AdminView->output();
    }
    
    public function Editaccount()
    {
        $viewPath = VIEWS_PATH . 'pages/Account/Editaccount.php';
        require_once $viewPath;
        $AdminView = new Editaccount($this->getModel(), $this);
        $AdminView->output();
    }
    

    
    public function addproducts()
    {
        $viewPath = VIEWS_PATH . 'pages/products/Addproducts.php';
        require_once $viewPath;
        $AdminView = new Addproducts($this->getModel(), $this);
        $AdminView->output();
    }

    
    public function viewcustomers()
    {
        $viewPath = VIEWS_PATH . 'pages/Viewcustomers.php';
        require_once $viewPath;
        $AdminView = new Viewcustomer($this->getModel(), $this);
        $AdminView->output();
    }
    public function viewemployees()
    {
        $viewPath = VIEWS_PATH . 'pages/Viewemployees.php';
        require_once $viewPath;
        $AdminView = new Viewemployees($this->getModel(), $this);
        $AdminView->output();
    }
    public function searchform()
    {
        // $searchModel = $this->getModel();
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $searchModel->setInput(trim($_POST['input']));
        // }

        $viewPath = VIEWS_PATH . 'pages/Orders/searchform.php';
        require_once $viewPath;
        $AdminView = new searchform($this->getModel(), $this);
        $AdminView->output();
    }

}

