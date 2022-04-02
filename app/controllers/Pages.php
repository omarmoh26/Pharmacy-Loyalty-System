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

}
