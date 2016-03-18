<?php
require_once "config_class.php";

class Format {
    private $config;
    
    public function __construct(){
        $this->config = new Config();
    }
    
    public function ts(){
        return time();
    }
    
    public function xss($data){//защита от уязвимостей
        if(is_array($data)) {//если массив то пропускаем его выстраивая новый массив
            $escaped = array();
            
            foreach($data as $key=>$value){
                $escaped[$key] = $this->xss($value);//рекурсия
            }
            return $escaped;
            
        }
        return htmlspecialchars($data);//если данные строка то очищаем и выдаем
    }
}
?>