<?php
	mb_internal_encoding("UTF-8");
	$dir_lib = "lib/";
	require_once $dir_lib."manage_class.php";
	require_once $dir_lib."url_class.php";

	$manage = new Manage();
	$func = $_REQUEST["func"];
	session_start();
	if($func == "add_cart") {
		$manage->addCart();
	} elseif($func == "delete_cart") {  
		$manage->deleteCart();
	} elseif ($func == "cart") {
		$manage->updateCart();  
	} elseif ($func == "reg") {
		$manage->addUser($_POST);
	} elseif ($func == "exit") {
		unset($_SESSION["user"]);
	} else exit;
	
	$link = ($_SERVER["HTTP_REFERER"] != "")? $_SERVER["HTTP_REFERER"]: $url->index;
	header("Location: $link");
	exit;
?>