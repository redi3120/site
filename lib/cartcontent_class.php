<?php
require_once "modules_class.php";

class CartContent extends Modules {
	protected $title = "Корзина товаров";
	protected $meta_desc = "Корзина товаров";
	protected $meta_key = "Корзина товаров";

	protected function getContent()
	{
		$cart = array();
		$summa = 0;
		if(isset($_SESSION["cart"])) {
			$ids = explode(",", $_SESSION["cart"]);
			$products = $this->product->getAllOnIDs($ids);

			$result = array();
			for($i = 0; $i < count($products); $i++){
				$result[$products[$i]["id"]] = $products[$i];
			}

			$ids_unique = array_unique($ids);

			$i = 0;

			foreach($ids_unique as $v){
				$cart[$i]["title"] = $result[$v]["title"];
				$cart[$i]["id"] = $result[$v]["id"];
				$cart[$i]["img"] = $result[$v]["img"];
				$cart[$i]["price"] = $result[$v]["price"];
				$cart[$i]["count"] = $this->getCountInArray($v, $ids);
				$cart[$i]["summa"] = $cart[$i]["count"] * $result[$v]["price"];
				$summa += $cart[$i]["summa"];
				$i++;
			}
		}

		$this->template->set("summa", $summa);
		$this->template->set("cart", $cart);
		$this->template->set("action", $this->url->action());

		return "cart";
	}
	
	private function getCountInArray($v, $array)
	{
		if($v == null) return 0;
		
		$count = 0;
		for($i = 0; $i < count($array); $i++){
			if($array[$i] == $v) $count++;
		}
		return $count;
	}
}
?>