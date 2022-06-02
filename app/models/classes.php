<?php
class myDB {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "pharmacy_loyalty_system";
	public $conn;

	function __construct() {
	$this->conn = $this->connectmyDB();
	}

	function connectmyDB() {
	$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
	return $conn;
	}
}

class myProduct {
	public $id;
	public $name;
	public $price;
	public $options;
	function __construct($id) {
		$db_handle = new myDB();
		$sql="SELECT * FROM product WHERE id=".$id;
		/////
		$result = mysqli_query($db_handle->conn,$sql);
		if($row=mysqli_fetch_array($result)) {
			$this->id=$row['id'];
			$this->name=$row['name'];
			$this->price=$row['Price'];
			$this->options=array();
		}
		$sql="SELECT options.Name,product_s_o_v.Value 
		from options 
		INNER JOIN product_type_s_o on options.ID=product_type_s_o.Options
        INNER Join product_s_o_v on product_type_s_o.ID=product_s_o_v.Product_Type_S_O
		where product_s_o_v.Product_ID=".$id;
		$result = mysqli_query($db_handle->conn,$sql);
		while($row=mysqli_fetch_array($result)) {
			$this->options[$row['Name']]=$row[1];//x['drug strength']=500mg
		}	
	}

	static function getAllProducts()	{
		$i=0;
		$products[$i]=0;
		$db_handle = new myDB();
		$sql="SELECT * from product";
		$result = mysqli_query($db_handle->conn,$sql);
		while($row=mysqli_fetch_array($result)) {
			$products[$i++]=new myProduct($row[0]);
		}	
		return $products;
	}
}

class myCart{
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