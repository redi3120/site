<?php
require_once "modules_class.php";

class CartContent extends Modules {
    protected $title = "Корзина товаров";
    protected $meta_desc = "Корзина товаров";
    protected $meta_key = "Корзина товаров";
    
    protected function getContent(){
        $cart = array();
        $summa = 0;
        if($_SESSION["cart"]){
            $ids = explode(",", $_SESSION["cart"]);
            //print_r($ids);
            $products = $this->product->getAllOnIDs($ids);
            
            //print_r($products);
            
            $result = array();
            for($i = 0; $i < count($products); $i++){
                $result[$products[$i]["id"]] = $products[$i];
            }
            
            $ids_unique = array_unique($ids);
            
            
            //print_r($ids_unique);
            
            $i = 0;
            
            foreach($ids_unique as $v){
                $cart[$i]["title"] = $result[$v]["title"];
                
                $cart[$i]["id"] = $result[$v]["id"];
                
                $cart[$i]["img"] = $result[$v]["img"];
                $cart[$i]["price"] = $result[$v]["price"];
                $cart[$i]["count"] = $this->getCountInArray($v, $ids);
                
                $cart[$i]["summa"] = $cart[$i]["count"] * $result[$v]["price"];
                //echo "|".$result[$v]["count"]." --- ".$result[$v]["price"]."<br />";
                //$cart[$i]["link_delete"] = $result[$v]["link_delete"];
                
                $summa += $cart[$i]["summa"];
                $i++;
            }
            
            /*
            $value = $this->discount->getValueOnCode($_SESSION["discount"]);
          
            if($value){
                $summa *= (1 - $value);
            }
            */
        }
       
        $this->template->set("summa", $summa);
        $this->template->set("cart", $cart);
        $this->template->set("action", $this->url->action());
        //$this->template->set("link_order", $this->url->order());
        
        return "cart";
    }
    
    private function getCountInArray($v, $array){
        $count = 0;
        for($i = 0; $i < count($array); $i++){
            if($array[$i] == $v) $count++;
        }
        return $count;
    }

}
?>