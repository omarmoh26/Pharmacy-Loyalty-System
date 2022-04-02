<?php
class UserModel extends model
{
    protected $username;
    protected $password;

    protected $usernameerr;
    protected $passwordErr;

    public function __construct()
    {
        parent::__construct();
        
        $this->username    = '';
        $this->password = '';
        

        $this->usernameerr    = '';
        $this->passwordErr = '';
    }
    
    
    //username
    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
   
    //password
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    

    //username err
    public function getUsernameerr()
    {
        return $this->usernameerr;
    }
    public function setUsernameerr($usernameerr)
    {
        $this->usernameerr = $usernameerr;
    }

    //password err
    public function getPasswordErr()
    {
        return $this->passwordErr;
    }
    public function setPasswordErr($passwordErr)
    {
        $this->passwordErr = $passwordErr;
    }

    public function findUserByUsername($username)
    {
        $this->dbh->query('select * from users where username= :username');
        $this->dbh->bind(':username', $username);

        $userRecord = $this->dbh->single();
        return $this->dbh->rowCount();
    }

    public function usernameExist($username)
    {
        return $this->findUserByUsername($username) > 0;
    }
}
