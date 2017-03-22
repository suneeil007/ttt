<?php  
class Admin extends MX_Controller {
	
		function __construct(){
		parent::__construct();	
		
		$this->load->library('auth/ion_auth');
        
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login');
            exit();
        }	
		$this->load->model('category_model'); 
		
		//load categories in all category pages
		$cat_data['categories'] = $this->general_db_model->get_ByTbl_Col('categories','parent_id', 0);			
		$this->load->vars($cat_data);
	}

	function all($parent_category_id  = 0){
		
		$sub_data = array();	
		
		$sub_data['subcategories'] = $this->category_model->getByParentId($parent_category_id) ;
		
		$this->template->load('admin/admin','admin/categories', $sub_data);		
	
	}
	
	function edit_image(){
		$id   = $this->uri->segment(4);
		$data = array();
		if($id){
			$data['image']  =  $this->general_db_model->getById('categories', 'id', $id);			
		}
		
		$this->template->load('admin/admin','admin/edit_image', $data);		
	}
	
	function add_edit_Category(){
			$id   =   $this->input->post('oldcat_id'); 	
		
		//Edit mode
		if($id){
			$name 			= 'oldname'.$id ;		
			$description 	= 'olddescription'.$id ;		
			$parent_id 		= 'oldparent_id';		
			$order 			= 'oldOrder'.$id ;					
			
			$sub_cat_update_data['name']   			=  $this->input->post($name); 			
			$sub_cat_update_data['description']    	=  $this->input->post($description);	
			$sub_cat_update_data['parent_id']   	=  $this->input->post($parent_id); 	
			$sub_cat_update_data['order']   		=  $this->input->post($order); 	
			
				$this->general_db_model->update('categories', $sub_cat_update_data, array("id"=>$id));		
				
			redirect(base_url().'admin/category/all','refresh');	
		//Insert mode
		}else{
			$sub_cat_data['name']   		=  $this->input->post('name'); 
			
			$sub_cat_data['description']    =  $this->input->post('description');	

			$sub_cat_data['parent_id']   	=  $this->input->post('category'); 	
			$sub_cat_data['order']   		=  $this->input->post('order'); 
			
			if($this->input->post('cat_image') !=' '){
				
				$pimage_data =	uploadfile('cat_image', 'jpeg|jpg|png|gif' , CATEGORIES_DIR , 2000); 							
				$filename = $pimage_data['raw_name'].$pimage_data['file_ext'];						
				
				$sub_cat_data['image'] = $filename;									
			}
				
				$this->general_db_model->insert('categories', $sub_cat_data);
			}
		}
		
	function upload_image($id){
		$picture = $this->general_db_model->getById('categories', 'id', $id);
		
		if(!empty($picture->image)){
				unlink(CATEGORIES_DIR.'/'.$picture->image) ;	
				$this->general_db_model->_custom_query('UPDATE  categories SET image = "" WHERE id =' .$id);				
		}
								
		$pimage_data   = uploadfile('featured_image', 'jpeg|jpg|png|gif' , CATEGORIES_DIR , 2000); 							
		$filename      = $pimage_data['raw_name'].$pimage_data['file_ext'];						
		
		$sub_cat_data['image']  = $filename;	

		$this->general_db_model->update('categories', $sub_cat_data, array('id'=>$id));												
	}	
	
		
	function delete($id){
		$this->general_db_model->delete('categories','id = '.$id);
	}	
		
	// Delete FEATURED image
	function deleteImage($id) {	
		$picture = $this->general_db_model->getById('categories', 'id', $id);
		
		unlink(CATEGORIES_DIR.'/'.$picture->image) ;
	
		$this->general_db_model->_custom_query('UPDATE  categories SET image = "" WHERE id =' .$id);	
	}
}
