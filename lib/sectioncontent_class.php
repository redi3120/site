<?php
require_once "modules_class.php";

class SectionContent extends Modules {
	protected $title = "Интернет магазин обуви";
    protected $meta_desc = "Краткое описание Интернет магазин обуви";
    protected $meta_key = "Интернет магазин обуви, туфли, купить туфли, размеры туфли";
    
    protected function getContent(){ 
        if(isset($_GET['id'])) $id = (int)$_GET['id'];
		else $id = 1;
        if($id == 0) $id = 1;
        
        $page = $this->section->getAllProd($id);
        
		foreach($page as $key => $val){
			$page[$key]['description'] = lib::sub_aut($val['description']);
		}
		
        $this->template->set("products", $page);
        
		return "section";
    }
}
?>