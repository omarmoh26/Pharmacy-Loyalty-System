<?php
require_once 'CustomerModel.php';
class EditCustomerAdminModel extends CustomerModel
{
    public  $title = 'customer edit Page';
    protected $id;
    protected $name;
    protected $nameErr;

    protected $address;
    protected $addressErr;


    public function __construct()
    {
        parent::__construct();
        $this->name     = "";
        $this->nameErr = "";

        $this->address     = "";
        $this->addressErr = "";

    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
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

    public function getaddress()
    {
        return $this->address;
    }
    public function setaddress($address)
    {
        $this->address = $address;
    }
    public function getaddressErr()
    {
        return $this->addressErr;
    }
    public function setaddressErr($addressErr)
    {
        $this->addressErr = $addressErr;
    }

    public function getcustomerName($id)
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT name FROM customer where id='$id' limit 1";
        $result=mysqli_query($conn,$sql);
        $name = mysqli_fetch_assoc($result);
        return $name['name'] ;
    }

    public function getcustomerphone_number($id)
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT phone_number FROM customer where id='$id' limit 1";
        $result=mysqli_query($conn,$sql);
        $phone_number = mysqli_fetch_assoc($result);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $phone_number['phone_number'];
    }

    public function getcustomeraddress($id)
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT address FROM customer where id='$id' limit 1";
        $result=mysqli_query($conn,$sql);
        $address = mysqli_fetch_assoc($result);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $address['address'];
    }
    public function ApplyCustEdit()
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="UPDATE customer SET name='$this->name' , phone_number='$this->phone_number', address='$this->address' WHERE id='$this->id' ";
        $result=mysqli_query($conn,$sql);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $result;
    }
}