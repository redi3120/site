<?php
require_once "global_class.php";

class Product extends GlobalClass {
        public function __construct() {
    		parent::__construct("products");
    	}
        
        public function getAllData($count){
            return $this->transform($this->getAll("id", true, $count));
        }
        
        public function transformElement($product){
            $product["img"] = $product["img"];
            //$product["link"] = $this->url->product($product["id"]);
            //$product["link_cart"] = $this->url->addCart($product["id"]);
            //$product["description"] = str_replace("\n", "</br>",$this->url->addCart($product["description"]));
            //$product["link_delete"] = $this->url->deleteCart($product["id"]);
            
            return $product;
        }
        
        /*public function checkSortUp($sort, $up){
            return ((($sort === "title") || ($sort === "price")) && (($up === "1") || ($up === "1")));
        }
        
        public function getAllOnSectionID($section_id, $sort, $up){
            if (!$this->checkSortUp($sort, $up)) return $this->transform($this->getAllOnField("section_id", $section_id));
    		return $this->transform($this->getAllOnField("section_id", $section_id, $sort, $up));
        }
        
    	public function get($id, $section_table) {
    		if (!$this->check->id($id)) return false;
    		$query = "SELECT `".$this->table_name."`.`id`,
    		`".$this->table_name."`.`section_id`,
    		`".$this->table_name."`.`img`,
    		`".$this->table_name."`.`title`,
    		`".$this->table_name."`.`price`,
    		`".$this->table_name."`.`year`,
    		`".$this->table_name."`.`country`,
    		`".$this->table_name."`.`director`,
    		`".$this->table_name."`.`play`,
    		`".$this->table_name."`.`cast`,
    		`".$this->table_name."`.`description`,
    		`$section_table`.`title` as `section`
    		FROM `".$this->table_name."`
    		INNER JOIN `$section_table` ON `$section_table`.`id` = `".$this->table_name."`.`section_id`
    		WHERE `".$this->table_name."`.`id` = ".$this->config->sym_query;
    		
			echo "fff".$section_table;
			return $this->transform($this->db->selectRow($query, array($id)));
    	} */
		
		public function get($id) {
    		if (!$this->check->id($id)) return false;
			
			echo $this->table_name;
    	}
        
	public function getAllOnIDs($ids) {
		$query_ids = "";
		$params = array();
		for ($i = 0; $i < count($ids); $i++) {
			$query_ids .= $this->config->sym_query.",";
			$params[] = $ids[$i];
		}
		$query_ids = substr($query_ids, 0, -1);
		$query = "SELECT * FROM `".$this->table_name."` WHERE `id` IN ($query_ids)";
		return $this->transform($this->db->select($query, $params));
	}
	
	public function getOneProduct($id) {
		$query = "SELECT * FROM `".$this->table_name."` WHERE `id` = $id";
		return $this->db->select($query);
	}
    
 	public function getProductSec($id) {
		$query = "SELECT * FROM `".$this->table_name."` WHERE `section_id` = $id";
        //echo $query;
		return $this->db->select($query);
	}

    public function getPriceOnIDs($ids) {
    	$products = $this->getAllOnIDs($ids);
    	$result = array();
    	for ($i = 0; $i < count($products); $i++) {
    		$result[$products[$i]["id"]] = $products[$i]["price"];
    	}
    	$summa = 0;
    	for ($i = 0; $i < count($ids); $i++) {
    		$summa += $result[$ids[$i]];
    	}
    	return $summa;
    }

	public function getOthers($product_info, $count) {
		$l = $this->getL($count, 0);
		$query = "SELECT * FROM `".$this->table_name."` WHERE `section_id`=".$this->config->sym_query." AND `id` != ".$this->config->sym_query. " ORDER BY RAND() $l";
		return $this->transform($this->db->select($query, array($product_info["section_id"], $product_info["id"])));
    }

	public function getAllSort($count){
      		$l = $this->getL($count, 0);
    		
			$query = "SELECT * FROM 
    			(SELECT * FROM `".$this->table_name."` ORDER BY `id` DESC $l) a
    			ORDER BY `id`";
            
    		return $this->transform($this->db->select($query));
        }
    }
?>
