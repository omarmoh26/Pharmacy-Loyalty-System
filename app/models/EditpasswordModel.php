<?php
require_once 'UserModel.php';

class EditpasswordModel extends UserModel
{
    public  $title = 'User Registration Page';

    protected $oldPassword;
    protected $oldPasswordErr;

    protected $newPassword;
    protected $newPasswordErr;

    protected $confirmPassword;
    protected $confirmPasswordErr;

    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->oldPassword     = "";
        $this->oldPasswordErr = "";

        $this->confirmPassword = "";
        $this->confirmPasswordErr = "";
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getoldPassword()
    {
        return $this->oldPassword;
    }
    public function setoldPassword($oldPassword)
    {
        $this->oldPassword = $oldPassword;
    }

    public function getoldPasswordErr()
    {
        return $this->oldPasswordErr;
    }
    public function setoldPasswordErr($oldPasswordErr)
    {
        $this->oldPasswordErr = $oldPasswordErr;
    }

    public function getnewPassword()
    {
        return $this->newPassword;
    }
    public function setnewPassword($newPassword)
    {
        $this->newPassword = $newPassword;
    }

    public function getnewPasswordErr()
    {
        return $this->newPasswordErr;
    }
    public function setnewPasswordErr($newPasswordErr)
    {
        $this->newPasswordErr = $newPasswordErr;
    }

    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;
    }

    public function getConfirmPasswordErr()
    {
        return $this->confirmPasswordErr;
    }
    public function setConfirmPasswordErr($confirmPasswordErr)
    {
        $this->confirmPasswordErr = $confirmPasswordErr;
    }
    public function newpass()
    {
        // $id=$_SESSION['user_id'];
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="UPDATE users SET password='$this->newPassword' WHERE id='$this->id' ";
        $result=mysqli_query($conn,$sql);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $result;
    }
}