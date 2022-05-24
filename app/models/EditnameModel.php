<?php
require_once 'UserModel.php';
class EditnameModel extends UserModel
{
    public  $title = 'User Registration Page';
    protected $id;
    protected $name;
    protected $nameErr;
    protected $type;


    public function __construct()
    {
        parent::__construct();
        $this->name     = "";
        $this->nameErr = "";
        $this->type=1;
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
    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
    public function getAdminName($id)
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT name FROM users where id='$id' limit 1";
        $result=mysqli_query($conn,$sql);
        $name = mysqli_fetch_assoc($result);
        return $name['name'] ;
    }
    public function getAdminUserName($id)
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT username FROM users where id='$id' limit 1";
        $result=mysqli_query($conn,$sql);
        $username = mysqli_fetch_assoc($result);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else{
            $this->username=$username['username'];
            return $username['username'];
        }

            
    }

    public function ApplyEdit()
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="UPDATE users SET name='$this->name' , username='$this->username' WHERE id='$this->id' ";
        $result=mysqli_query($conn,$sql);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $result;
    }
}
