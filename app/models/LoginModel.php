<?php
require_once 'UserModel.php';
class LoginModel extends UserModel
{
    public  $title = 'User Login Page';

    public function login()
    {
        $this->dbh->query('select * from users where username= :username');
        $this->dbh->bind(':username', $this->username);

        $record = $this->dbh->single();

        $pepper = "c1isvFdxMDdmjOlvxpecFw";
        $pwd = $this->password;
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        $pwd_hashed = $record->password;
        
        if (password_verify($pwd_peppered, $pwd_hashed)) {
            return $record;
        } else {
            return false;
        }
    }
}
