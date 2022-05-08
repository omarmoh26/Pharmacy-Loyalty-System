<?php
class CustomerModel extends model
{
    protected $phone_number;
    protected $phone_numberErr;

    public function __construct()
    {
        parent::__construct();
        
        $this->phone_number = '';
        $this->phone_numberErr = '';
    }
    
    //phone_number
    public function getPhone_number()
    {
        return $this->phone_number;
    }
    public function setPhone_number($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    //phone_number err
    public function getPhone_numberErr()
    {
        return $this->phone_numberErr;
    }
    public function setPhone_numberErr($phone_numberErr)
    {
        $this->phone_numberErr = $phone_numberErr;
    }

    public function findUserByPhone_number($phone_number)
    {
        $this->dbh->query('select * from customer where phone_number= :phone_number');
        $this->dbh->bind(':phone_number', $phone_number);

        $userRecord = $this->dbh->single();
        return $this->dbh->rowCount();
    }

    public function Phone_numberExist($phone_number)
    {
        return $this->findUserByPhone_number($phone_number) > 0;
    }
}
