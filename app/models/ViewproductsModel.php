<?php
class ViewproductsModel extends model
{
  
     public function getAllProducts()
    {
     
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT * FROM product";
        $result = mysqli_query($conn,$sql);	
		return $result;
    }
}
