<?php
require_once "config_class.php";

class Lib
{
    public static function sub_aut($string, $end = 80)
	{
		$string = strip_tags($string);
		$string = mb_substr($string, 0, $end);
		$string = rtrim($string, '!,.-');
		$string = substr($string, 0, strrpos($string, ' '));
		$string = $string.'...';
		return $string;
	}
}
?>