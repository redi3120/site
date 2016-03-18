<?php
require_once "global_class.php";

class Page extends GlobalClass
{
	public function __construct()
	{
		parent::__construct("pages");
	}

	public function getOne($id)
	{
  		return $this->getOnePr($id);
	}
}
?>
