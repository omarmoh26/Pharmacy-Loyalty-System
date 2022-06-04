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
        $addproductsModel = $this->getModel();
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

    public function Editproducts()
    {
        $EditproductsModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $EditproductsModel->setId(trim($_POST['id']));
            $EditproductsModel->setName(trim($_POST['name']));
            $EditproductsModel->setPrice(trim($_POST['price']));
            $EditproductsModel->setPtype(trim($_POST['type']));
            $EditproductsModel->setQuantity(trim($_POST['quantity']));


            //validation
            if (empty($EditproductsModel->getName())) {
                $EditproductsModel->setNameErr('Please enter a name');
            }
            if (empty($EditproductsModel->getPrice())) {
                $EditproductsModel->setPriceErr('Please enter a price');
            }
            if (empty($EditproductsModel->getPtype())) {
                $EditproductsModel->setPtypeErr('Please choose a type');
            }
            if (empty($EditproductsModel->getQuantity())) {
                $EditproductsModel->setQuantityErr('Please enter the quantity');
            }

            if (
                empty($EditproductsModel->getNameErr()) &&
                empty($EditproductsModel->getPriceErr()) &&
                empty($EditproductsModel->getPtypeErr()) &&
                empty($EditproductsModel->getQuantityErr())
            ) {

                if ($EditproductsModel->ApplyProdEdit()) {
                    redirect('products/viewproducts');
                } else {
                    die('Error in editing the product');
                }
            }
        }

        $viewPath = VIEWS_PATH . 'pages/products/Editproducts.php';
        require_once $viewPath;
        $EditproductsView = new Editproducts($this->getModel(), $this);
        $EditproductsView->output();
    }


    
    public function receipt()
    {
        $viewPath = VIEWS_PATH . 'pages/Orders/receipt.php';
        require_once $viewPath;
        $AdminView = new receipt($this->getModel(), $this);
        $AdminView->output();
    }


}
