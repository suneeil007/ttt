<?php
class Category extends MX_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model('category_model');		
	}
	
	function get_table() {
		$table = "categories";
		return $table;
	}

	
	function getByParentId($parentid){
	$table = $this->get_table();
  	$query =  $this->db ->where('parent_id', $parentid)
					  ->order_by('id')
      			      ->get($table) ;
	return $query->result() ;				
	}
	
}