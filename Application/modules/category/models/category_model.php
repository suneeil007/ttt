<?php
class Category_model extends MX_Controller {

	function __construct()	{
		parent::__construct();				
		
		$this->load->library('breadcrumbs');
	}
	
	function get_table() {
		$table = "categories";
		return $table;
	}
	
	function _custom_query($mysql_query) {
		$query = $this->db->query($mysql_query);
		return $query;
	}
	
	
	function get_sub_categories($id){      
	 $table = $this->get_table();
	 $query =  $this->db->select('id, name')
		      		->where('parent_id', $id)
      			    ->get($table) ;
 
      $groups = array();
 
      if($query->result()){
          foreach ($query->result() as $group) {
              $groups[$group->id] = $group->name;
          }
      return $groups;
      }else{
          return FALSE;
      }
	}
	

	function getByParentId($parentid){
	  $table = $this->get_table();
	  $query =  $this->db ->where('parent_id', $parentid)
						  ->get($table) ;
		return $query->result() ;				
	}
	
	function getByParentId_withLimit($parentid , $limit){
	  $table = $this->get_table();
	  $query =  $this->db ->where('parent_id', $parentid)
  						   ->order_by('order','ASC')
						   ->limit($limit)
						  ->get($table) ;
		return $query->result() ;				
	}
	
	function get_latest_categoryId() {
		$table = $this->get_table();	  
		$result = $this->db->where('parent_id', 0)
						   ->order_by('id','desc')
						   ->limit(1)
						   ->get($table) ;
	  
		  return $result->row()->id ;
	}
	
	function get_first_sub_category($parent_cat) {
		$table = $this->get_table();	  
		$result = $this->db->where('parent_id', $parent_cat)
						   ->order_by('order','ASC')
						   ->limit(1)
						   ->get($table) ;
	  
		  return $result->row();
	}
	
	
	//for creating breadcrumbs of cms pages links
	function BreadCrumbs($id) {
	 $table = $this->get_table();
     $row = $this->general_db_model->getById($table,'id', $id);
	
	 if($row) {	 		
 		    $this->BreadCrumbs($row->parent_id) ; 
			
			$this->breadcrumbs->push($row->name, base_url().'toweurs/'.decode_title($row->name).'/'.$row->id);		
		}		
		return $this->breadcrumbs->show() ;

    }	
	
}