<?php
require_once "modules_class.php";

class ServiceContent extends Modules {
    protected $title = "Гарантия и сервисное обслуживание";
    protected $meta_desc = "Краткое описание Гарантия и сервисное обслуживание";
    protected $meta_key = "Ключевые слова Гарантия и сервисное обслуживание";

    protected function getContent(){
        $page = $this->page->getOne(1);
		$this->template->set("page", $page[0]);
		return "page";
    }
}
?>