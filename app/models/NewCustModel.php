<?php
require_once 'CustomerModel.php';
class NewCustModel extends CustomerModel
{
    public  $title = 'New Customer Page';
    protected $name;
    protected $nameErr;

    protected $address;
    protected $addressErr;


    public function __construct()
    {
        parent::__construct();
        $this->name     = "";
        $this->nameErr = "";

        $this->address = "";
        $this->addressErr = "";
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
    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddressErr()
    {
        return $this->addressErr;
    }

    public function setAddressErr($addressErr)
    {
        $this->addressErr = $addressErr;
    }

    public function signup()
    {
        $this->dbh->query("INSERT INTO customer (`name`, `phone_number`, `address`) VALUES(:uname, :phone_number, :addr)");
        $this->dbh->bind(':uname', $this->name);
        $this->dbh->bind(':phone_number', $this->phone_number);
        $this->dbh->bind(':addr', $this->address);
        return $this->dbh->execute();
    }
}
