<?php
require_once 'UserModel.php';
class ViewemployeesModel extends UserModel
{
    public  $title = 'View Employees Page';

    public function getAllEmployees()
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT * FROM users where id != 1";
        $result = mysqli_query($conn,$sql);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $result;
    }
}