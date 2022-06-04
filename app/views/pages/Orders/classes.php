<?php
class DB {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "pharmacy_loyalty_system";
	public $conn;

	function __construct() {
	$this->conn = $this->connectDB();
	}

	function connectDB() {
	$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
	return $conn;
	}
}

class Product {
	public $id;
	public $name;
	public $price;
	public $options;
	function __construct($id) {
		$db_handle = new DB();
		$sql="SELECT * FROM product WHERE id=".$id;
		/////
		$result = mysqli_query($db_handle->conn,$sql);
		if($row=mysqli_fetch_array($result)) {
			$this->id=$row['id'];
			$this->name=$row['name'];
			$this->price=$row['Price'];
			$this->options=array();
		}
	}

	static function getAllProducts()	{
		$i=0;
		$products[$i]=0;
		$db_handle = new DB();
		$sql="SELECT * from product";
		$result = mysqli_query($db_handle->conn,$sql);
		while($row=mysqli_fetch_array($result)) {
			$products[$i++]=new Product($row[0]);
		}	
		return $products;
	}
}

class Cart{
	public $productsQuantity;

	function __construct(){
		$this->productsQuantity=array();
	}

	function addProduct($productID,$q){
		if (array_key_exists((string)$productID,$this->productsQuantity))
			$this->productsQuantity[(string)$productID]+= $q;
		else
			$this->productsQuantity[(string)$productID]= $q;
	}

	function removeProduct($productID){
		unset($this->productsQuantity[(string)$productID]); 
	}

	function emptyCart(){
		unset($this->productsQuantity); 
		$this->productsQuantity=array();
	}
}

?>