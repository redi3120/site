<?php
require_once "config_class.php";

class Url
{
	private $config;
	private $amp;

	public function __construct($amp = true)
	{
		$this->config = new Config();
		$this->amp = $amp;
	}

	public function getView()
	{
		$view = $_SERVER["REQUEST_URI"];
		$view = substr($view, 1);
		if(($pos = strpos($view,"?")) !== false){
			$view = substr($view, 0, $pos);
		}
		return $view;
	}

	public function setAMP($amp)
	{
		$this->amp = $amp;
	}

	public function getThisURL() {
		$uri = substr($_SERVER["REQUEST_URI"], 1);
		return $this->config->address."/".$uri;
	}

	private function deleteGET($url, $param)
	{
		$res = $url;
		if (($p = strpos($res, "?")) !== false) {
			$paramstr = substr($res, $p + 1);
			$params = explode("&", $paramstr);
			$paramsarr = array();
			foreach ($params as $value) {
				$tmp = explode("=", $value);
				$paramsarr[$tmp[0]] = $tmp[1];
			}
			if (array_key_exists($param, $paramsarr)) {
				unset($paramsarr[$param]);
				$res = substr($res, 0, $p + 1);
				foreach ($paramsarr as $key => $value) {
					$str = $key;
					if ($value !== "") {
						$str .= "=$value";
					}
					$res .= "$str&";
				}
				$res = substr($res, 0, -1);
			}
		}
		return $res;
	}

	private function returnURL($url, $index = false)
	{
		if(!$index) $index = $this->config->address;
		if($url == "") return $index;
		if(strpos($url, $index) !== 0) $url = $index.$url;
		if($this->amp) $url = str_replace("&","&amp;", $url);
		return $url;
	}

	public function index()
	{
		return $this->returnURL("");
	}

	public function cart()
	{
		return $this->returnURL("/cart");
	}

	public function contacts()
	{
		return $this->returnURL("/contacts");
	}

	public function action()
	{
		return $this->returnURL("/functions.php");
	}

	public function section($id)
	{
		return $this->returnURL("/section?id=$id");
	}

	public function product($id)
	{
		return $this->returnURL("/product?id=$id");
	}

	public function addCart($id)
	{
		return $this->returnURL("/functions.php?func=add_cart&id=$id");
	}

	public function deleteCart($id)
	{
		return $this->returnURL("/functions.php?func=delete_cart&id=$id");
	}

	private function sortOnField($field, $up)
	{
		$this_url = $this->getThisURL();
		
		return $this->returnURL($url);
	}
}
?>