<?php
require_once 'AddproductsModel.php';
class EditproductsModel extends AddproductsModel
{

    protected $id;
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getproductName($id)
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT name FROM product where id='$id' limit 1";
        $result=mysqli_query($conn,$sql);
        $name = mysqli_fetch_assoc($result);
        return $name['name'] ;
    }

    public function getproductPrice($id)
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT Price FROM product where id='$id' limit 1";
        $result=mysqli_query($conn,$sql);
        $phone_number = mysqli_fetch_assoc($result);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $phone_number['Price'];
    }

    public function getproductQuant($id)
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT quantity FROM product where id='$id' limit 1";
        $result=mysqli_query($conn,$sql);
        $address = mysqli_fetch_assoc($result);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $address['quantity'];
    }
    public function getproductType($id)
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT Product_Type  FROM product where id='$id' limit 1";
        $result=mysqli_query($conn,$sql);
        $address = mysqli_fetch_assoc($result);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $address['Product_Type '];
    }
    public function ApplyProdEdit()
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="UPDATE product SET name='$this->name', Price='$this->price',Product_Type='$this->ptype',quantity='$this->quantity' WHERE id='$this->id' ";
        $result=mysqli_query($conn,$sql);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $result;
    }
}