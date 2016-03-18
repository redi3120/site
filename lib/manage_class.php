<?php
require_once "config_class.php";
require_once "format_class.php";
require_once "product_class.php";
require_once "order_class.php";
require_once "global_class.php";

class Manage extends GlobalClass
{
	protected $config;
	protected $format;
	protected $product;
	protected $order;
	
	public function __construct()
	{
		session_start();
		
		$this->config = new Config();
		$this->format = new Format();
		$this->product = new Product();
		$this->order = new Order();
		$this->data = $this->format->xss($_REQUEST);
		$this->saveData();
	}
	
	private function saveData()
	{
		foreach ($this->data as $key => $value) $_SESSION[$key] = $value;
	}
	
	public function addCart($id = false)
	{
		if (!$id) $id = $this->data["id"];
		
		if (!$this->product->existsID($id)) return false;
		
		if ($_SESSION["cart"]) $_SESSION["cart"] .= ",$id";
		else $_SESSION["cart"] = $id;
	}
	
	public function deleteCart()
	{
		$id = $this->data["id"];
		
		$ids = explode(",", $_SESSION["cart"]);
		
		$_SESSION["cart"] = "";
		
		for ($i = 0; $i < count($ids); $i++) {
			if ($ids[$i] != $id) $this->addCart($ids[$i]);
		}
	}
	
	public function updateCart()
	{
  		$_SESSION["cart"] = "";
		foreach ($this->data as $k => $v) {
			if (strpos($k, "count_") !== false) {
				$id = substr($k, strlen("count_"));
				for ($i = 0; $i < $v; $i++) $this->addCart($id);
			}
		}
	}
	
	public function addUser($data)
	{
  		$name = htmlspecialchars($data['name']);
		$email = htmlspecialchars($data['email']);
		$pass = htmlspecialchars($data['password']);
		$arr = array('name'=>$name, 'email'=>$email, 'pass'=>$pass);

		return $this->regNewUser($arr);
	}  
	
	public function addOrder()
	{
		$temp_data = array();
		$temp_data["delivery"] = $this->data["delivery"];
		$temp_data["product_ids"] = $_SESSION["cart"];
		$temp_data["price"] = $this->getPrice();
		$temp_data["name"] = $this->data["name"];
		$temp_data["phone"] = $this->data["phone"];
		$temp_data["email"] = $this->data["email"];
		$temp_data["address"] = $this->data["address"];
		$temp_data["notice"] = $this->data["notice"];
		$temp_data["date_order"] = $this->format->ts();
		$temp_data["date_send"] = 0;
		$temp_data["date_pay"] = 0;

		$id = $this->order->add($temp_data);
		return false;
	}
	
	private function getPrice()
	{
		$ids = explode(",", $_SESSION["cart"]);
		$summa = $this->product->getPriceOnIDs($ids);
		return $summa;
	}
}
?>