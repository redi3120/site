<?php
require_once "modules_class.php";

class DelivContent extends Modules {
	protected $title = "Доставка товаров";
	protected $meta_desc = "Краткое описание Доставка товаров";
	protected $meta_key = "Ключевые слова Доставка товаров";

	protected function getContent(){ 
		$page = $this->page->getOne(2);
		$this->template->set("page", $page[0]);
		return "page";
	}
}
?>