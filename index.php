<?php
error_reporting(E_ALL);

mb_internal_encoding("UTF-8");
$dir_lib = "lib/";
require_once $dir_lib."url_class.php";

$url = new URL();
$view = $url->getView();

$class = $view."content";

if(file_exists($dir_lib.$class."_class.php")){
	require_once $dir_lib.$class."_class.php";
    new $class;
} else {echo "error";}
?>