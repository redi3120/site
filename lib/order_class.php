<?php
    require_once "global_class.php";
    
    class Order extends GlobalClass {
        
        public function __construct(){
            parent::__construct("orders");
        }
        
    	protected function checkData($data) {
    		if (!$this->check->oneOrZero($data["delivery"])) return "ERROR_DELIVERY";
    		if (!$this->check->ids($data["product_ids"])) return "UNKNOWN_ERROR";
    		if (!$this->check->amount($data["price"])) return "ERROR_PRICE";
    		if (!$this->check->name($data["name"])) return "ERROR_NAME";
    		if (!$this->check->title($data["phone"])) return "ERROR_PHONE";
    		if (!$this->check->email($data["email"])) return "ERROR_EMAIL";
    		if ($data["delivery"] == 1) $empty = true;
    		else $empty = false;
    		if (!$this->check->text($data["address"], $empty)) return "ERROR_ADDRESS";
    		if (!$this->check->text($data["notice"], true)) return "ERROR_NOTICE";
    		if (!$this->check->ts($data["date_order"])) return "UNKNOWN_ERROR";
    		if (!$this->check->ts($data["date_send"])) return "UNKNOWN_ERROR";
    		if (!$this->check->ts($data["date_pay"])) return "UNKNOWN_ERROR";
    		return true;
    	}
    }
?>