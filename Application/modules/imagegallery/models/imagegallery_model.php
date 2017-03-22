<?php
class Imagegallery_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	function get_table() {
		$table = "galleries";
		return $table;
	}

function count_all($column, $value) {
$table = $this->get_table();
$this->db->where($column, $value);
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows; 
}

function getByGroupId($groupId){
	$table = $this->get_table();
	$this->db->order_by('weight','ASC');
	return $this->general_db_model->get_ByTbl_Col($table, 'groupId', $groupId);
}

function getByparentIdwithorder ($parentId) {
	$table = $this->get_table();
	$result = $this->db->where('groupId',$parentId)
					   ->order_by('weight','ASC')
					   ->get($table) ;
	return $result->result();
}

 function getLatestByGroupId($groupId, $limit)
 {
	$table = $this->get_table();
  
	$result = $this->db->where('groupId',$groupId)
					   ->order_by('weight','ASC')
					   ->limit($limit)
					   ->get($table) ;
  
	  return $result->result() ;
 }

function get_all($perPage,$uri,$id) {
	$table = $this->get_table();
	$getData = $this->db->where('groupId',$id)
		     ->order_by('weight','ASC')		
		 	 ->get($table, $perPage, $uri);
		
		if($getData->num_rows() > 0)
			return $getData->result();
		else
			return null;
	}
	
function do_upload_gallery() {
		
        $config['upload_path'] = GALLERIES_DIR; // server directory
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; // by extension, will check for whether it is an image
        $config['max_size']    = '4000'; // in kb
/*        $config['max_width']  = '1024';
        $config['max_height']  = '768'; */
		$config['encrypt_name']   = 'TRUE' ;
        
        $this->load->library('upload');
		
		$this->upload->initialize($config); 	
		
        $this->load->library('Multi_upload');
    
        $files = $this->multi_upload->go_upload();
        
       if ( ! $files ) {
            $error = array('error' => $this->upload->display_errors());
            return  $error;
        } else{
			return $files ;
        } 
    } 
	
function deleteGallImg($id) {	
		$picture = $this->general_db_model->getById( 'galleries', 'id', $id);

	// delete Gallery image
		unlink(GALLERIES_DIR.'/'.$picture->image) ;		
		
		$this->general_db_model->delete('galleries', 'id = '.$id);	
		
	}
}
?>