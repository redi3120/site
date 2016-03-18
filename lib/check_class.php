<?php
require_once "config_class.php";

class Check {
    private $config;
    private $amp;
    
    public function __construct($amp = true){
        $this->config = new Config();
        $this->amp = $amp;
    }
    
    public function id($id, $zero = false){
        if(!$this->intNumber($id)) return false;//если число не целое то неправильно
        if((!$zero) && ($id == 0)) return false;
        return $id >= 0;//правильно если оно больше 0
    }
    
	public function title($title) {
		return $this->isString($title, 1, $this->config->max_title);
	}
    
	public function email($email) {
		if ($this->isContainQuotes($email)) return false;
		$reg = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9_]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+$/i";
		return preg_match($reg, $email);
	}
    
 	public function text($text, $empty = false) {
		if (($empty) && ($text == "")) return true;
		return $this->isString($text, 1, $this->config->max_text);
	}
    
    public function ts($ts) {
		return $this->noNegativeInteger($ts);
	}
    
	private function isContainQuotes($string) {
		$array = array("\"", "'", "`", "&quot;", "&apos;");
		foreach ($array as $value) {
			if (strpos($string, $value) !== false) return true;
		}
		return false;
	}
	
	private function isString($string, $min_length, $max_length) {
		if (!is_string($string)) return false;
		if (strlen($string) < $min_length) return false;
		if (strlen($string) > $max_length) return false;
		return true;
	}
    
    public function name($name) {
		if ($this->isContainQuotes($name)) return false;
		return $this->isString($name, 1, $this->config->max_name);
	}
    
    private function doubleNumber($number) {
		return is_numeric($number);
	}
	
    public function ids($ids) {
		$reg = "/^\d+(,\d+)*\d?$/i";
		return preg_match($reg, $ids);
	}
    
    public function amount($amount) {
		if (!$this->doubleNumber($amount)) return false;
		return $amount >= 0;
	}
    
    public function oneOrZero($number){
        if(!$this->intNumber($id)) return false;
        return (($number == 0) || ($number == 1));
    }
    
    public function count($count){
        return $this->noNegativeInteger($count);
    }
    
    public function offset($offset){
        return $this->intNumber($number);
    }
    
    private function noNegativeInteger($number){
        if(!$this->intNumber($number)) return false;
        return ($number >= 0);
    }
    
    private function intNumber($number){//число ли это
        if(!is_int($number) && (!is_string($number))) return false;
        return preg_match("/^-?(([1-9][0-9]*)|(0))$/", $number);
        
    }
}
?>