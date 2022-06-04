<?php
$_SESSION['lastcart'] = clone $_SESSION['cart'];
require_once("classes.php");
class CheckoutModel extends model
{
     protected $customerID;
     protected $cashierID;
     protected $date_time;
     protected $paid;
     protected $t_change;
     protected $total;
     protected $currentpoints;
     protected $added_points;
     protected $used_points;
     protected $discount;
     protected $orderID;

     public function setcustomerID($customerID)
     {
          $this->customerID = $customerID;
     }
     public function getcustomerID()
     {
          return $this->customerID;
     }

     public function setcashierID($cashierID)
     {
          $this->cashierID = $cashierID;
     }
     public function getcashierID()
     {
          return $this->cashierID;
     }

     public function setdate($date_time)
     {
          $this->date_time = $date_time;
     }
     public function getdate()
     {
          return $this->date_time;
     }

     public function setpaid($paid)
     {
          $this->paid = $paid;
     }
     public function getpaid()
     {
          return $this->paid;
     }

     public function settchange($t_change)
     {
          $this->t_change = $t_change;
     }
     public function gettchange()
     {
          return $this->t_change;
     }

     public function settotal($total)
     {
          $this->total = $total;
     }
     public function gettotal()
     {
          return $this->total;
     }

     public function setaddedpoints($added_points)
     {
          $this->added_points = $added_points;
     }
     public function getaddedpoints()
     {
          return $this->added_points;
     }

     public function setusedpoints($used_points)
     {
          $this->used_points = $used_points;
     }
     public function getusedpoints()
     {
          return $this->used_points;
     }

     public function setcurrentpoints($currentpoints)
     {
          $this->currentpoints = $currentpoints;
     }
     public function getcurrentpoints()
     {
          return $this->currentpoints;
     }

     public function setdiscount($discount)
     {
          $this->discount = $discount;
     }
     public function getdiscount()
     {
          return $this->discount;
     }
     public function setOrder_ID($orderID)
     {
          $this->orderID = $orderID;
     }
     public function getOrder_ID()
     {
          return $this->orderID;
     }


     public function newOrder()
     {
          $this->dbh->query("INSERT INTO `orders`(`customer_id`, `cashier_id`, `date_time`, `paid`, `t_change`, `total`, `added_points`, `used_points`,`discount`) 
                              VALUES(:custid, :cashid, :date_time, :paid,:change, :total, :addedpoints,:usedpoints,:discount)");

          $this->dbh->bind(':custid', $this->customerID);
          $this->dbh->bind(':cashid', $this->cashierID);
          $this->dbh->bind(':date_time', $this->date_time);
          $this->dbh->bind(':paid', $this->paid);
          $this->dbh->bind(':change', $this->t_change);
          $this->dbh->bind(':total', $this->total);
          $this->dbh->bind(':addedpoints', $this->added_points);
          $this->dbh->bind(':usedpoints', $this->used_points);
          $this->dbh->bind(':discount', $this->discount);
          return $this->dbh->execute();
     }
     public function getorderID()
     {    $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
          $sql = "SELECT `order_id` FROM orders ORDER BY orders.order_id DESC LIMIT 1";
          $result = mysqli_query($conn, $sql);
          if (!$result)
               trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>", E_USER_WARNING);
          else {
               $row = mysqli_fetch_array($result);
               $this->orderID = $row['order_id'];
               return true;
          }
     }
     public function addOrderDetails()
     {

          foreach ($_SESSION['lastcart']->productsQuantity as $productID => $quantity) {
               $this->dbh->query("INSERT INTO `order_description`(`order_id`, `product_id`, `quantity`) 
                              VALUES(:orderID, :productID, :quantity)");

               $this->dbh->bind(':orderID', $this->orderID);
               $product = new myProduct($productID);
               $this->dbh->bind(':productID', $product->id);
               $this->dbh->bind(':quantity', $quantity);
               $this->dbh->execute();
          }
          return true;
     }
     public function updatePointsValue()
     {    $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
          $newPoints = ($this->currentpoints + $this->added_points - $this->used_points);

          $sql = "UPDATE `customer` SET `points`='$newPoints' WHERE id='$this->customerID'";
          $result = mysqli_query($conn, $sql);
          if (!$result)
               trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>", E_USER_WARNING);
          else
               return $result;
     }
     public function updateProdQuant()
     {    $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");

          $sql1="SELECT product_id,quantity FROM `order_description` WHERE order_id=$this->orderID GROUP BY product_id";
          $result1 = mysqli_query($conn, $sql1);
          while ($row = mysqli_fetch_array($result1)) {
               $sql2="SELECT quantity FROM `product` WHERE id=". $row['product_id'];
               $result2 = mysqli_query($conn, $sql2);

               $oldQuant = mysqli_fetch_array($result2);
               if($oldQuant['quantity'] == 0 || ($oldQuant['quantity']-$row['quantity'])<=0 ){
                    $newQuant=0;
               }
               else{
                    $newQuant=$oldQuant['quantity']-$row['quantity'];
               }
               $sql3 = "UPDATE `product` SET `quantity`=$newQuant WHERE id=". $row['product_id'];
               mysqli_query($conn, $sql3);
          }
     }

     public function getCustomerName($id)
     {    $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
          $sql = "SELECT name FROM customer where id=$id";
          $result = mysqli_query($conn, $sql);
          if (!$result)
               trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>", E_USER_WARNING);
          else {
               $row = mysqli_fetch_array($result);
               return $row['name'];
          }
     }
     public function getCustomerPoints($id)
     {
          $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
          $sql = "SELECT points FROM customer where id=$id";
          $result = mysqli_query($conn, $sql);
          if (!$result)
               trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>", E_USER_WARNING);
          else {
               $row = mysqli_fetch_array($result);
               return $row['points'];
          }
     }


}
