<?php
require_once "global_class.php";

class Product extends GlobalClass
{
	public function __construct()
	{
		parent::__construct("products");
 	}

	public function getAllData($count)
	{
		return $this->transform($this->getAll("id", true, $count));
	}
	
	public function transformElement($product)
	{
	    $product["img"] = $product["img"];
	    return $product;
	}
	
	public function get($id)
	{
    	if (!$this->check->id($id)) return false;
	}
	
	public function getAllOnIDs($ids)
	{
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
	
	public function getOneProduct($id)
	{
		$query = "SELECT * FROM `".$this->table_name."` WHERE `id` = $id";
		return $this->db->select($query);
	}
    
 	public function getProductSec($id)
 	{
		$query = "SELECT * FROM `".$this->table_name."` WHERE `section_id` = $id";
		return $this->db->select($query);
	}

    public function getPriceOnIDs($ids)
	{
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

	public function getOthers($product_info, $count)
	{
		$l = $this->getL($count, 0);
		$query = "SELECT * FROM `".$this->table_name."` WHERE `section_id`=".$this->config->sym_query." AND `id` != ".$this->config->sym_query. " ORDER BY RAND() $l";
		return $this->transform($this->db->select($query, array($product_info["section_id"], $product_info["id"])));
    }

	public function getAllSort($count)
	{
      		$l = $this->getL($count, 0);
    		
			$query = "SELECT * FROM 
    			(SELECT * FROM `".$this->table_name."` ORDER BY `id` DESC $l) a
    			ORDER BY `id`";
	    
    		return $this->transform($this->db->select($query));
	}
}
?>
