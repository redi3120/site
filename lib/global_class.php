<?php
require_once "database_class.php";
require_once "config_class.php";
require_once "check_class.php";
require_once "url_class.php";

abstract class GlobalClass
{
	protected $db;
	protected $table_name;
	protected $check;
	protected $url;

	public function __construct($table_name)
	{
		$this->db = DataBase::getDB();
		$this->config = new Config();
		$this->check = new Check();
		$this->url = new URL();
		$this->table_name = $this->config->db_prefix.$table_name;
	}

	public function existsID($id)
	{
		if(!$this->check->id($id)) return false;
		
		return $this->isExistsFV("id", $id);
	}

	protected function isExistsFV($field, $value)
	{
		$result = $this->getAllOnField($field, $value);
		return count($result) != 0;
	}

	public function getAll($order = false, $up = true, $count = false, $offset = false)
	{
		$ol = $this->getOL($order, $up, $count, $offset);
		$query = "SELECT * FROM `".$this->table_name."` $ol";
		return $this->db->select($query);
	}

	public function getSection($id)
	{
		$query = "SELECT * FROM `".$this->table_name."` WHERE section_id = $id";
		return $this->db->select($query);
	}

	public function getSectIdOne($id)
	{
		$query = "SELECT * FROM `".$this->table_name."` WHERE id = $id";
		return $this->db->select($query);
	}

	public function getSectionOnly($id)
	{
		$query = "SELECT * FROM `".$this->table_name;
		return $this->db->select($query);
	}

	public function get($id)
	{
		if (!$this->check->id($id)) return false;
		return $this->getOnField("id", $id);
	}

	protected function getField($field_in, $value_in, $field_out)
	{
		$query = "SELECT `$field_out` FROM `".$this->table_name."` WHERE `$field_in` = ".$this->config->sym_query;
		return $this->db->selectCell($query, array($value_in));
	}
	
 	public function getOnePr($id) {
		$query = "SELECT * FROM `".$this->table_name."` WHERE `id`= $id";
		return $this->db->select($query);
	}

	public function getOnField($field, $value)
	{
		$query = "SELECT * FROM `".$this->table_name."` WHERE `$field` = ".$this->config->sym_query;
		return $this->db->selectRow($query, array($value));
	}

	protected function getAllOnField($field, $value, $order = false, $up = true, $count = false, $offset = false)
	{
		$ol = $this->getOl($order, $up, $count, $offset);
		$query = "SELECT * FROM `".$this->table_name."` WHERE `$field` = ".$this->config->sym_query." $ol";
		return $this->db->select($query, array($value));
	}

	public function regNewUser($data)
	{ 
		$query = "INSERT INTO `users` (";
		foreach ($data as $field => $value) $query .= "`$field`,";
		$query = substr($query, 0, -1);
		$query .= ") VALUES (";
		foreach ($data as $value) $query .= "'".$value."',";
		$query = substr($query, 0, -1);
		$query .= ")";

		$res = DataBase::insert($query);
		if($res) $_SESSION["user"] = "user";
		return $res;
	}

	protected function getOl($order, $up, $count, $offset)
	{
		if ($order) {
			$order = "ORDER BY `$order`";
			if (!$up) $order .= " DESC";
		}
		$limit = $this->getL($count, $offset);
		return "$order $limit";
	}

	protected function transform($element)
	{
		if (!$element) return false;
		
		if (isset($element[0])) return $element;
		else return $element;
	}

	protected function getL($count, $offset)
	{
		$limit = "";
		if($count){
			if(!$this->check->count($count)) return false;
			if($offset) {
				if(!$this->check->offset($offset)) return false;
				$limit = "LIMIT $offset, $count";
			}
			else $limit = "LIMIT $count";
		}
		return $limit;
	}

	public function getTableName()
	{
		return $this->table_name;
	}
}
?>