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
    public function addproducts()
    {
        $addproductsModel= $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $addproductsModel->setName(trim($_POST['name']));
            $addproductsModel->setPrice(trim($_POST['price']));
            $addproductsModel->setPtype(trim($_POST['type']));
            $addproductsModel->setQuantity(trim($_POST['quantity']));


            //validation
            if (empty($addproductsModel->getName())) {
                $addproductsModel->setNameErr('Please enter a name');
            }
            if (empty($addproductsModel->getPrice())) {
                $addproductsModel->setPriceErr('Please enter a price');
            } 
            if (empty($addproductsModel->getPtype())) {
                $addproductsModel->setPtypeErr('Please choose a type');
            } 
            if (empty($addproductsModel->getQuantity())) {
                $addproductsModel->setQuantityErr('Please enter the quantity');
            } 

            if (
                empty($addproductsModel->getNameErr()) &&
                empty($addproductsModel->getPriceErr()) &&
                empty($addproductsModel->getPtypeErr()) &&
                empty($addproductsModel->getQuantityErr())
            ) {
               
                if ($addproductsModel->AddNewProduct()) {
                    redirect('products/viewproducts');
                } else {
                    die('Error in adding the product');
                }
            }
        }









        $viewPath = VIEWS_PATH . 'pages/products/Addproducts.php';
        require_once $viewPath;
        $addproductsView = new Addproducts($this->getModel(), $this);
        $addproductsView->output();
    }
}
