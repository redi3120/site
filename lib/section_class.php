<?php
	require_once "global_class.php";

	class Section extends GlobalClass
	{
		private $product;
		
		public function __construct()
		{
			parent::__construct("sections");
		}
		
		public function getAllData($id = 1)
		{
			return $this->transform($this->getSectionOnly($id));
		}
		
		public function getSectId($id = 1)
		{
			return $this->getSectIdOne($id);
		}
		
		public function getAllProd($id = 1)
		{
			$this->product = new Product();
			
			return $this->product->getProductSec($id);
			
		}
	}
?>