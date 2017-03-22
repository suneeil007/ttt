<?php  
class Admin extends MX_Controller {
	
		function __construct(){
		parent::__construct();	
		
		$this->load->library('auth/ion_auth');
        
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login');
            exit();
        }	
		$this->load->library('pagination');
		$this->load->model('postjob_model'); 
	}

    

	
	function all(){

		$cpage['job_data'] = $this->postjob_model->get_all();		
	
	    $this->template->load('admin/admin','admin/postjob', $cpage);	
	}


	//	function add_edit_product(){
//		$p_id				   		= $this->input->post('p_id' , true); 
//				
//		$pro_data['name']   		= $this->input->post('name' , true);		
//		$pro_data['description']    = $this->input->post('description', true);		
//		$pro_data['model']   		= $this->input->post('model', true); 
//		
//		if($this->input->post('sub_category') == '-1' || $this->input->post('sub_category') == 0){
//			$pro_data['cat_id']    		= $this->input->post('category', true);		
//		}else{
//			$pro_data['cat_id']    		= $this->input->post('sub_category', true);		
//		}
//		$pro_data['dimension']   	= $this->input->post('dimension', true); 
//		$pro_data['order']    		= $this->input->post('order', true);		
//		$pro_data['price']   		= $this->input->post('price', true); 
//		$pro_data['currency']   	= $this->input->post('currency', true); 
//		$pro_data['date'] 		    = date('Y-m-d');		
//		$pro_data['hide_price'] 	= 'no';
//		
//		if($this->input->post('price_publish')){
//			$pro_data['hide_price'] = 'yes';
//		}
//			}


	function add_edit_job(){

			$sub_job_data['job_title']   		    =  $this->input->post('jobtitle'); 
			
			$sub_job_data['country']                =  $this->input->post('country');	

			$sub_job_data['job_description']      	=  $this->input->post('description'); 
	
			$sub_job_data['num_vacancies']   		=  $this->input->post('number'); 

            $sub_job_data['job_category']   		=  $this->input->post('categories');

            $sub_job_data['salary']   		        =  $this->input->post('salary');   
			
				$this->general_db_model->insert('postjob', $sub_job_data);
                redirect(base_url().'admin/postjob/all','refresh');
                 
		}

	function details($id){
		$job_data['job_detail'] = $this->general_db_model->getById( 'postjob', 'id', $id) ;		
		
		$this->template->load('admin/admin','admin/job_detail', $job_data);		
	}
	
	function delete($id){
		$res = 	$this->general_db_model->getById('postjob','id', $id) ;	
			if($res->photo !=''){				
				unlink(APPLICATIONS_DIR.'/'.$res->photo) ;		
			}
		
		$this->general_db_model->delete('postjob','id = '.$id);
	}
	
	
	
}