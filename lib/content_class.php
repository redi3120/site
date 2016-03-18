<?php
require_once "modules_class.php";

class Content extends Modules {
    protected $title = "Интернет-магазин";
    protected $meta_desc = "Интернет-магазин по продаже обуви";
    protected $meta_key = "Интернет-магазин по продаже обуви";
    
    protected function getContent(){
        $data_prod = $this->product->getAllSort(true, false, $this->config->count_on_page);
		
		foreach($data_prod as $key => $val){
			$data_prod[$key]['description'] = $this->sub_aut($val['description']);
		}		
        $this->template->set("products", $data_prod);

        return "index";
    }
	
	public function sub_aut($string, $end = 80) {
		$string = strip_tags($string);
		$string = mb_substr($string, 0, $end);
		$string = rtrim($string, '!,.-');
		$string = substr($string, 0, strrpos($string, ' '));
		$string = $string.'...';
		return $string;
	}
	
}
?>