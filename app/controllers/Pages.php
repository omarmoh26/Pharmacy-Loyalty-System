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
        $EditnameView = new Editname($this->getModel(), $this);
        $EditnameView->output();
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
            } else {
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
        $Editpasswordview = new Editpassword($EditpasswordModel, $this);
        $Editpasswordview->output();
    }


    public function Deleteaccount()
    {
        $viewPath = VIEWS_PATH . 'pages/Account/Deleteaccount.php';
        require_once $viewPath;
        $DeleteaccountView = new Deleteaccount($this->getModel(), $this);
        $DeleteaccountView->output();
    }

    public function Editaccount()
    {
        $viewPath = VIEWS_PATH . 'pages/Account/Editaccount.php';
        require_once $viewPath;
        $EditaccountView = new Editaccount($this->getModel(), $this);
        $EditaccountView->output();
    }

    public function livesearch()
    {
        $viewPath = VIEWS_PATH . 'pages/Orders/livesearch.php';
        require_once $viewPath;
        $livesearchView = new livesearch($this->getModel(), $this);
        $livesearchView->output();
    }

    


    public function viewcustomers()
    {
        $viewPath = VIEWS_PATH . 'pages/Viewcustomers.php';
        require_once $viewPath;
        $viewcustomersView = new Viewcustomer($this->getModel(), $this);
        $viewcustomersView->output();
    }
    public function viewemployees()
    {
        $viewPath = VIEWS_PATH . 'pages/Viewemployees.php';
        require_once $viewPath;
        $viewemployeesView = new Viewemployees($this->getModel(), $this);
        $viewemployeesView->output();
    }
    public function indexCart()
    {
        $viewPath = VIEWS_PATH . 'pages/customers/indexCart.php';
        require_once $viewPath;
        $indexCartView = new indexCart($this->getModel(), $this);
        $indexCartView->output();
    }
    public function Order()
    {
        // $OrderModel = $this->getModel();


        $viewPath = VIEWS_PATH . 'pages/Orders/Order.php';
        require_once $viewPath;
        $OrderView = new Order($this->getModel(), $this);
        $OrderView->output();
    }
    public function Checkout()
    {
        $checkoutModel = $this->getModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $checkoutModel->setcustomerID(trim($_POST['customerID']));
            $checkoutModel->setcashierID(trim($_SESSION['user_id']));
            $checkoutModel->setdate(date("Y-m-d h:i:sa"));

            $checkoutModel->setcurrentpoints(trim($_POST['customerPoints']));
            $custpoints = $checkoutModel->getcurrentpoints();
            $checkoutModel->settotal(trim($_POST['total']));
            $total = $checkoutModel->gettotal();

            if (!empty($_POST['cashonly']) && empty($_POST['cashNpoints'])) {
                $checkoutModel->setpaid(trim($_POST['cashonly']));

                $checkoutModel->setaddedpoints($total);
                $checkoutModel->setusedpoints(0);

                $change = $checkoutModel->getpaid() - $total;
                $checkoutModel->settchange($change);
                $checkoutModel->setdiscount(0);
            }
            if (!empty($_POST['cashNpoints']) && empty($_POST['cashonly'])) {
                $checkoutModel->setpaid(trim($_POST['cashNpoints']));

                $checkoutModel->setaddedpoints(0);
                
                // change = (paid)-(total)-(customerpoints*0.1)
                $change = $checkoutModel->getpaid() - ($total - ($custpoints * 0.1));
                $checkoutModel->setusedpoints(($checkoutModel->getpaid()-$total-$change)*10);
                $checkoutModel->settchange($change);
                $checkoutModel->setdiscount($custpoints * 0.1);
            }
            if (empty($_POST['cashNpoints']) && empty($_POST['cashonly'])) {
                $checkoutModel->setpaid(0);
                $checkoutModel->setaddedpoints(0);
                $checkoutModel->setusedpoints($total * 10);
                $checkoutModel->settchange(0);
                $checkoutModel->setdiscount($total);
            }

            if ($checkoutModel->newOrder()) {
                $checkoutModel->updatePointsValue();
                if ($checkoutModel->getorderID()) {
                    if ($checkoutModel->addOrderDetails()) {
                        $checkoutModel->updateProdQuant();

                        redirect('customers/OldCust');
                    } else {
                        die('Error in adding order details');
                    }
                } else {
                    die('Error in getting order id');
                }
            } else {
                die('Error in confirming order');
            }
        }

        $viewPath = VIEWS_PATH . 'pages/Orders/Checkout.php';
        require_once $viewPath;
        $CheckoutView = new Checkout($this->getModel(), $this);
        $CheckoutView->output();
    }
    
    public function Vieworders()
    {
        $viewPath = VIEWS_PATH . 'pages/Vieworders.php';
        require_once $viewPath;
        $ViewordersView = new Vieworders($this->getModel(), $this);
        $ViewordersView->output();
    }
    public function Viewodetails()
    {
        $viewPath = VIEWS_PATH . 'pages/Viewodetails.php';
        require_once $viewPath;
        $ViewodetailsView = new Viewodetails($this->getModel(), $this);
        $ViewodetailsView->output();
    }
}
