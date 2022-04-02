<?php
class UserModel extends model
{
    protected $ID;
    protected $name;
    protected $username;
    protected $password;
    protected $type;

    protected $usernameerr;
    protected $passwordErr;

    public function __construct()
    {
        parent::__construct();
        $this->ID    = '';
        $this->name    = '';
        $this->username    = '';
        $this->password = '';
        $this->type = '';

        $this->usernameerr    = '';
        $this->passwordErr = '';
    }
    //id
    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
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
    //name
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
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
    //type
    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
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
