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
        $viewPath = VIEWS_PATH . 'pages/Order.php';
        require_once $viewPath;
        $AdminView = new Order($this->getModel(), $this);
        $AdminView->output();
    }

    public function Checkout()
    {
        $viewPath = VIEWS_PATH . 'pages/Checkout.php';
        require_once $viewPath;
        $AdminView = new Checkout($this->getModel(), $this);
        $AdminView->output();
    }
    public function Addemployee()
    {
        $viewPath = VIEWS_PATH . 'pages/Addemployee.php';
        require_once $viewPath;
        $AdminView = new Addemployee($this->getModel(), $this);
        $AdminView->output();
    }
}
