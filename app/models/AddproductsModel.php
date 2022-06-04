<?php
require_once 'UserModel.php';
class AddproductsModel extends Model
{
    protected $name;
    protected $nameErr;

    protected $price;
    protected $priceErr;

    protected $ptype;
    protected $ptypeErr;

    protected $quantity;
    protected $quantityErr;

    public function __construct()
    {
        parent::__construct();
        $this->name     = "";
        $this->nameErr = "";
        $this->price = "";
        $this->priceErr = "";
        $this->ptype = "";
        $this->ptypeErr = "";
        $this->quantity = "";
        $this->quantityErr = "";
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getNameErr()
    {
        return $this->nameErr;
    }
    public function setNameErr($nameErr)
    {
        $this->nameErr = $nameErr;
    }


    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPriceErr()
    {
        return $this->priceErr;
    }
    public function setPriceErr($priceErr)
    {
        $this->priceErr = $priceErr;
    }
    
    public function getPtype()
    {
        return $this->ptype;
    }
    public function setPtype($ptype)
    {
        $this->ptype = $ptype;
    }
    public function getPtypeErr()
    {
        return $this->ptypeErr;
    }
    public function setPtypeErr($ptypeErr)
    {
        $this->ptypeErr = $ptypeErr;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function getQuantityErr()
    {
        return $this->quantityErr;
    }
    public function setQuantityErr($quantityErr)
    {
        $this->quantityErr = $quantityErr;
    }


    public function AddNewProduct()
    {
        $this->dbh->query("INSERT INTO `product`(`name`, `Price`, `Product_Type`, `quantity`) VALUES(:uname, :price, :ptype, :quan)");
        $this->dbh->bind(':uname', $this->name);
        $this->dbh->bind(':price', $this->price);
        $this->dbh->bind(':ptype', $this->ptype);
        $this->dbh->bind(':quan', $this->quantity);
        return $this->dbh->execute();
    }
    public function getAllTypes()
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT * FROM product_type";
        $result = mysqli_query($conn,$sql);	
		return $result;
    }
}
