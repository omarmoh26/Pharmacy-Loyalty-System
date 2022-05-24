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
            // else if($EditnameModel->getUsername() != trim($_POST['username'])) {
            //     if(!($EditnameModel->usernameExist($_POST['username']))){
                    
            //     }
            // } 

            // If no errors
            if (
                empty($EditnameModel->getUsernameerr()) &&
                empty($EditnameModel->getnameerr())
            ) {
                
                if ($EditnameModel->ApplyEdit()) {
                    $_SESSION['user_id'] = $EditnameModel->getName();
                    $_SESSION['user_name'] = $EditnameModel->getUsername();
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



    public function Editpassword()
    {
        $viewPath = VIEWS_PATH . 'pages/Account/Editpassword.php';
        require_once $viewPath;
        $AdminView = new Editpassword($this->getModel(), $this);
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
    
}
