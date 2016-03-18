<?php
class Config {
    public $sitename = "ShopShoes";
    public $address = "http://job.loc";
    public $db_host = "localhost";
    public $db_user = "root";
    public $db_password = "";
    public $db_name = "job";
    public $db_prefix = "";
    public $sym_query = "{?}";
    
    public $admname = "Yakovlev Alexandr";
    public $admemail = "redi312@mail.ru";
    
    public $count_on_page = 6;
    
    public $dir_text = "lib/text/";
    public $dir_tmpl = "tmpl/";
    //public $dir_img_products = "images/products/";
	public $dir_img_products_min = "/images/mini/";
    public $count_others = "3";
    public $max_name = 255;
    public $max_title = 255;
    public $max_text = 60000;
}
?>