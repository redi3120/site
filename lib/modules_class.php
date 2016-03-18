<?php
require_once "config_class.php";
require_once "url_class.php";
//require_once "format_class.php";
require_once "template_class.php";
require_once "section_class.php";
require_once "product_class.php";
//require_once "discount_class.php";
//require_once "message_class.php";

abstract class Modules {
    
    protected $config;
    protected $data;
    protected $url;
    //protected $format;
    protected $section;
    protected $product;
    //protected $discount;
    //protected $message;
    
    public function __construct(){
        //session_start();
        $this->config = new Config();
        $this->url = new Url();
        //$this->format = new Format();
        //$this->data = $this->format->xss($_REQUEST);
        $this->template = new Template($this->config->dir_tmpl);
        $this->section = new Section();
        $this->product = new Product();
        //$this->discount = new Discount();
        //$this->message = new Message();
        
        //$this->setInfoCart();
        
        $this->template->set("content", $this->getContent());
        $this->template->set("title", $this->title);
        $this->template->set("meta_desc", $this->meta_desc);
        $this->template->set("meta_key", $this->meta_key);
        $this->template->set("index", $this->url->index());
        $this->template->set("link_delivery", $this->url->delivery());
        $this->template->set("link_cart", $this->url->cart());
        $this->template->set("link_contacts", $this->url->contacts());
        $this->template->set("items", $this->section->getAllData());
        $this->template->set("action", $this->url->action());
        $this->template->display("main");
    }
    /*
    private function setInfoCart(){
        $ids = explode(",", $_SESSION["cart"]);
        $summa = $this->product->getPriceOnIDs($ids);
        $this->template->set("cart_count", count($ids));
        $this->template->set("cart_summa", $summa);
    }
    */
    abstract protected function getContent();
    
    protected function setLinkSort(){
        $this->template->set("link_price_up", $this->url->sortPriceUp());
        $this->template->set("link_price_down", $this->url->sortPriceDown());
        $this->template->set("link_title_up", $this->url->sortTitleUp());
        $this->template->set("link_title_down", $this->url->sortTitleDown());
    }
    
    protected function notFound(){
        $this->redirect($this->url->notFound());
    }
    /*
    protected function message(){
        echo ">>>>>>>>>> ". $_SESSION["message"]."<<<";
        
        if(!$_SESSION["message"]) return "";
        $text = $this->message->get($_SESSION["message"]);
        
        unset($_SESSION["message"]);
        return $text;
    }
    */
    protected function redirect($link){
        header("Location: $link");
        exit();
    }
}
?>