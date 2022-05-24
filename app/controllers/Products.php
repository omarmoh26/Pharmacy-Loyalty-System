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
    public function deleteproduct() 
    {
        redirect('products/Viewproducts');
        $viewPath = VIEWS_PATH . 'pages/Products/Deleteproduct.php';
        require_once $viewPath;
        $AdminView = new Deleteproduct($this->getModel(), $this);
        $AdminView->output();
    }
}
