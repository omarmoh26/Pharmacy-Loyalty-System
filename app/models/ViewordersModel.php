<?php
require_once 'CustomerModel.php';
class ViewordersModel extends CustomerModel
{
    public  $title = 'View Orders Page';

    public function getAllOrders()
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT * FROM orders";
        $result = mysqli_query($conn,$sql);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $result;
    }
}