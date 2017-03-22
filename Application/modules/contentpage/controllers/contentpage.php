<?php
class Contentpage extends MX_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model('contentpage_model');		
	}
 
}