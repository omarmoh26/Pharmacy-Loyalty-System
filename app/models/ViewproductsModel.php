<?php
class ViewproductsModel extends model
{
  
     public function getAllProducts()
    {
     
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="SELECT product.id,product.name,product.Price, product_type.Type FROM product,product_type where product.Product_Type= product_type.ID";
        $result = mysqli_query($conn,$sql);	
		return $result;
    }
}
