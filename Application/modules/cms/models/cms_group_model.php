<?php 
class Cms_Group_Model extends General_db_model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = "cms_groups";
return $table;
}

function get($order_by){
$table = $this->get_table();
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_where($id){
$table = $this->get_table();
$this->db->where('id', $id);
$query=$this->db->get($table);
return $query;
}

function get_where_custom($col, $value) {
$table = $this->get_table();
$this->db->where($col, $value);
$query=$this->db->get($table);
return $query;
}

function _insert($data){
$table = $this->get_table();
$this->db->insert($table, $data);
}

function _update($id, $data){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->update($table, $data);
}

function _delete($id){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->delete($table);
}

function count_where($column, $value) {
$table = $this->get_table();
$this->db->where($column, $value);
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function count_all() {
$table = $this->get_table();
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function get_max() {
$table = $this->get_table();
$this->db->select_max('id');
$query = $this->db->get($table);
$row=$query->row();
$id=$row->id;
return $id;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}


function get_SingleByParentId($parentId){
	$table = $this->get_table();
  
	$result = $this->db->where('parent_id',$parentId)			 		   
					   ->order_by('id','DESC')
					   ->limit(1)
					   ->get($table) ;
  
		return   $result->row() ;
 }	

function getByTypeParentId($type, $parentid){
$table = $this->get_table();
  $query =  $this->db->where('cms_grouptype_id', $type)
		       		 ->where('parent_id', $parentid)
					 ->order_by('weight')
      			    ->get($table) ;
	return $query->result() ;				
}

function getByParentId($parentid){
$table = $this->get_table();
  $query =  $this->db ->where('parent_id', $parentid)
					  ->order_by('weight')
      			      ->get($table) ;
	return $query->result() ;				
}

function getByParentId_pub($parentid){
$table = $this->get_table();
  $query =  $this->db ->where('parent_id', $parentid)
  					  ->where('publish', 'yes')
					  ->order_by('weight','ASC')
      			      ->get($table) ;
	return $query->result() ;				
}


function get_Last_Weight($type, $parentId){
		$table = $this->get_table();
		$query = $this->db->select('weight')
		      		->where('cms_grouptype_id', $type)
		      		->where('parent_id', $parentId)
					->limit(1)
					->order_by('weight','desc')
      			    ->get($table) ;
		
		$numRows = $query->num_rows();	

		if($numRows > 0)
		{
			foreach($query->result() as $row){
				$wt =	$row->weight + 5;
				echo $wt;
			}
	
		}
		else
			echo 5;
	}	
	
function get_groups($id){      
$table = $this->get_table();
	 $query =  $this->db->select('id, title')
		      		->where('cms_grouptype_id', $id)
		      		->where('is_parent', '1')
      			    ->get($table) ;
 
      $groups = array();
 
      if($query->result()){
          foreach ($query->result() as $group) {
              $groups[$group->id] = $group->title;
          }
      return $groups;
      }else{
          return FALSE;
      }
	}
	
function getCMSPage($id) {
$table = $this->get_table();
    $query =$this->db->where('id', $id) 
					 ->get($table, 1);
	if($query->num_rows() == 1) return $query->row();
}

function publish_unpublish($tid){
  		$table = $this->get_table();

		$row = $this->general_db_model->getById( $table, 'id', $tid) ;
 		
		if($row->publish == 'yes')
			$stat = 'no';
		else
			$stat = 'yes';
			
		$result = $this->db->where('id', $tid)
		 			       ->update($table, array("publish"=>$stat));							   
  }
  
  //for creating breadcrumbs of cms pages links
	function BreadCrumbs($id) {
	 $table = $this->get_table();
     $row = $this->general_db_model->getById($table,'id', $id);
	
	 if($row) {	 		
 		    $this->BreadCrumbs($row->parent_id) ; 
			
			$this->breadcrumbs->push($row->title, base_url().'pages/'.decode_title($row->title).'/'.$row->id);		
		}		
		return $this->breadcrumbs->show() ;
    } 
 }
?>