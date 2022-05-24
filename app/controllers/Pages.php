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

    public function Editname()
    {
        $viewPath = VIEWS_PATH . 'pages/Account/Editname.php';
        require_once $viewPath;
        $AdminView = new Editname($this->getModel(), $this);
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
