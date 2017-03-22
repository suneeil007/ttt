<?php
class Product extends MX_Controller {

	function __construct()	{
		parent::__construct();	
		$this->load->model('product_model');		
	}
	
 }
