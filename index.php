<?php
    error_reporting(E_ALL);

    require_once "start.php";
    require_once $dir_lib."url_class.php";
    
    $url = new URL();
    $view = $url->getView();
	
	$class = "content";
	
	if(file_exists($dir_lib.$class."_class.php")){
        require_once $dir_lib.$class."_class.php";
        new $class;
    } else {
        //require_once $dir_lib."notfoundcontent_class.php";
        //new NotFoundContent();
		echo "err";
    }
?>