<?php
require_once 'CustomerModel.php';
class OldCustModel extends CustomerModel
{
    public  $title = 'Old Customer Page';

    public function login()
    {
        $this->dbh->query('select * from customer where phone_number= :phone');
        $this->dbh->bind(':phone', $this->phone_number);

        $record = $this->dbh->single();

        if($record > 0) {
            return $record;
        } else {
            return false; 
        }
    }
}
