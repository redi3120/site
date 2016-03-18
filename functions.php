<?php //echo 111;
    require_once "start.php";
    require_once $dir_lib."manage_class.php";
    require_once $dir_lib."url_class.php";
    
    $manage = new Manage();
    $func = $_REQUEST["func"];
    
    if($func == "add_cart") {
        $manage->addCart();
    } elseif($func == "delete_cart") {  
        $manage->deleteCart();
    } elseif ($func == "cart") {
    	$manage->updateCart();  
    } elseif ($func == "order") {
		$success = $manage->addOrder();
	} else exit;
    
    $link = ($_SERVER["HTTP_REFERER"] != "")? $_SERVER["HTTP_REFERER"]: $url->index;
    header("Location: $link");
    //echo 111;
    exit;
?>