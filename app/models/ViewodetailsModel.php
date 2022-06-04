<?php
require_once 'CustomerModel.php';
class ViewodetailsModel extends CustomerModel
{
    public  $title = 'View Orders Page';

    public function getOrderDetails($id)
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT `order_description`.`order_id`,`product`.`name`,`order_description`.`quantity` FROM `order_description`,`product` 
                WHERE order_id=$id AND `order_description`.`product_id`=`product`.`id`;";
        $result = mysqli_query($conn,$sql);	
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $result;
    }
}