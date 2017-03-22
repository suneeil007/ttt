<?php
class Imagegallery extends MX_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model('imagegallery_model');		
	}
 
}