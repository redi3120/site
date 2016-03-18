<?php
require_once "modules_class.php";

class ProductContent extends Modules
{
	protected $title = "Туфли";
	protected $meta_desc = "Краткое описание Интернет магазин обуви";
	protected $meta_key = "Интернет магазин обуви, туфли, купить туфли, размеры туфли";

	protected function getContent(){ 
		if(isset($_GET['id'])) $id = (int)$_GET['id'];
		else $id = 1;

		if($id == 0) $id = 1;

		$data = $this->product->getOneProduct($id);
		$this->template->set("product", $data[0]);

		return "product";
    }
}
?>