<?php
class Products extends Controller
{
    public function viewproducts()
    {
        $viewPath = VIEWS_PATH . 'pages/Products/Viewproducts.php';
        require_once $viewPath;
        $AdminView = new Viewproducts($this->getModel(), $this);
        $AdminView->output();
    }
}
