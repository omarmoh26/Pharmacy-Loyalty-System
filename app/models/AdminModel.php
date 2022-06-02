<?php
class AdminModel extends model
{

     public $title = 'new ';
     public function getOrderCount()
     {
          $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
          $sql = "SELECT COUNT(*) as count FROM `orders`";
          $result = mysqli_query($conn, $sql);
          $name = mysqli_fetch_assoc($result);
          return $name['count'];
     }

     public function getEmpCount()
     {
          $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
          $sql = "SELECT COUNT(*) as count FROM `users` WHERE type='2' ";
          $result = mysqli_query($conn, $sql);
          $name = mysqli_fetch_assoc($result);
          return $name['count'];
     }

     public function getProductsCount()
     {
          $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
          $sql = "SELECT COUNT(*) as count FROM `product`";
          $result = mysqli_query($conn, $sql);
          $name = mysqli_fetch_assoc($result);
          return $name['count'];
     }
     public function getCustCount()
     {
          $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
          $sql = "SELECT COUNT(*) as count FROM `customer`";
          $result = mysqli_query($conn, $sql);
          $name = mysqli_fetch_assoc($result);
          return $name['count'];
     }

}
