<?php
require_once "modules_class.php";

class Content extends Modules
{
	protected $title = "Интернет-магазин";
	protected $meta_desc = "Интернет-магазин по продаже обуви";
	protected $meta_key = "Интернет-магазин по продаже обуви";

	protected function getContent()
	{
		$data_prod = $this->product->getAllSort($this->config->count_on_page);

		foreach($data_prod as $key => $val){
			$data_prod[$key]['description'] = lib::sub_aut($val['description']);
		}		
		$this->template->set("products", $data_prod);

		return "index";
	}	
}
?>