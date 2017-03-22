<?php
class Contentpage_model extends CI_Model
{
	private $tbl_person= 'cms_groups';
	
		function __construct(){
		parent::__construct();	
		
		$this->load->model('cms_group_model'); 		
	}
	
	// Delete featured image
	function deleteImage($id) {	
		$picture = $this->general_db_model->getById( 'cms_groups', 'id', $id);

	// delete featured image
		unlink(GROUPS_DIR.'/'.$picture->photo) ;
	
	//update photo field to '';
		$this->cms_group_model->_custom_query('UPDATE  cms_groups SET photo = "" WHERE id =' .$id);	
	}

	function get_listpages($perPage,$uri,$id) {
	$table = $this->tbl_person;
		$getData = $this->db->where('parent_id',$id)
				 ->order_by('weight','DESC')		
				 ->get($table, $perPage, $uri);
			
			if($getData->num_rows() > 0)
				return $getData->result();
			else
				return null;
	}
		
function getLatestByParentId($parentId, $limit)
 {
	$table = $this->tbl_person;
  
	$result = $this->db->where('parent_id',$parentId)
			 		   ->where('is_listpage','yes')
					   ->order_by('weight','DESC')
					   ->limit($limit)
					   ->get($table) ;
  
	  return $result->result() ;
 }	
				
	// upload featured image	
	function upload_image(){	

			$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => GROUPS_DIR,
			'max_size' => 2000,
			'encrypt_name' => true	);				
	
			$this->load->library('upload');
			
			$this->upload->initialize($config); 	
			
			$this->upload->do_upload('featured_image');			
			
			$pimage_data = $this->upload->data();						

		return $pimage_data ;
	}
	
	// group files upload
	function do_upload(){
        $config['upload_path'] = GROUP_FILES_DIR ; // server directory
        $config['allowed_types'] = 'gif|jpg|png|pdf|txt|xls|doc'; // by extension, will check for whether it is an image
        $config['max_size']    = '4000'; // in kb
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        
        $this->load->library('upload');
		
		$this->upload->initialize($config); 	
		
        $this->load->library('Multi_upload');
    
        $files = $this->multi_upload->go_upload();
        
       if ( ! $files )        
        {
            $error = array('error' => $this->upload->display_errors());
            return  $error;
        }    
        else
        {
           // $data = array('upload_data' => $files);
			return $files ;
        } 
    } 
  		

}
?>