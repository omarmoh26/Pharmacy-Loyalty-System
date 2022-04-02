<?php
require_once 'UserModel.php';
class LoginModel extends UserModel
{
    public  $title = 'User Login Page';

    public function login()
    {
        $this->dbh->query('select * from users where username= :username');
        $this->dbh->bind(':username', $username);

        $record = $this->dbh->single();
        $hash_pass = $record->password;

        if (password_verify($this->password,  $hash_pass)) {
            return $record;
        } else {
            return false; 
        }
    }
}
