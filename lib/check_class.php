<?php
require_once "config_class.php";

class Check
{
	private $config;
	private $amp;
	
	public function __construct($amp = true)
	{
		$this->config = new Config();
		$this->amp = $amp;
	}

	public function id($id, $zero = false)
	{
		if(!$this->intNumber($id)) return false;
		if((!$zero) && ($id == 0)) return false;
		return $id >= 0;
	}

	public function count($count)
	{
		return $this->noNegativeInteger($count);
	}
 
	private function noNegativeInteger($number)
	{
		if(!$this->intNumber($number)) return false;
		return ($number >= 0);
	}
	
	private function intNumber($number)
	{
		if(!is_int($number) && (!is_string($number))) return false;
		return preg_match("/^-?(([1-9][0-9]*)|(0))$/", $number);	
	}
}
?>