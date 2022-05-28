<?php
class OrderModel extends model
{
     public $title = 'new ';

     public function getCustomerName($id)
     {
          $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
          $sql = "SELECT name FROM customer where id=$id";
          $result = mysqli_query($conn, $sql);
          if (!$result)
               trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>", E_USER_WARNING);
          else {
               $row = mysqli_fetch_array($result);
               return $row['name'];
          }
     }
}
