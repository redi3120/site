<?php
require_once "global_class.php";

class Page extends GlobalClass {
    public function __construct() {
    	parent::__construct("pages");
    }

    public function getOne($id){//сортировка по названию и цене
  		$query = "SELECT * FROM `".$this->table_name."` WHERE `id`= $id";
		return $this->db->select($query);
    }
}
?>
