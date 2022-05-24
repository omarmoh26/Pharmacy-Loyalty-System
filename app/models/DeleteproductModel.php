<?php
class DeleteproductModel extends model
{
     
     public function DeleteProduct($id)
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="DELETE FROM product WHERE id=$id ";
        $results= $conn->query($sql);

        if (!$results){
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        }
        else
            return true;
    }
     
}