<?php
class receiptModel extends model
{
     protected $order_id;


     public function getOrderData($oid)
     {
          $this->order_id = $oid;
          $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");

          $sql = "SELECT orders.*,customer.name as cname,customer.points as cpoints,users.name as cashname FROM orders,customer,users 
          WHERE orders.order_id='$oid' AND orders.customer_id=customer.id AND orders.cashier_id=users.id
          ORDER BY `orders`.`order_id` DESC Limit 1";

          $result = mysqli_query($conn, $sql);
          if (!$result)
               trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>", E_USER_WARNING);
          else{
               return $result;
          }
     }
     public function getOrderDetails()
     {
          $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
          $sql = "SELECT product.name,order_description.quantity,product.Price,product.Price * order_description.quantity as total_price 
                    FROM order_description,product 
                    WHERE order_id='$this->order_id' and order_description.product_id=product.id";

          $result = mysqli_query($conn, $sql);
          if (!$result)
               trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>", E_USER_WARNING);
          else{
               return $result;
          }
     }
}
