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
		$this->load->model('testimonial_model'); 
	}


	function all(){
		$cpage['testimonials'] = $this->testimonial_model->get_All_tests();		
	
		$this->template->load('admin/admin','admin/testimonial_all', $cpage);	
	
	}
	
	
	function change_status($tid){
		$this->testimonial_model->publish_unpublish($tid);				
	}	
	
	function details($id){
		$feed_data['testimonialdetail'] = $this->general_db_model->getById( 'testimonials', 'id', $id) ;		
		
		$this->template->load('admin/admin','admin/testimonial_detail', $feed_data);		
	}
	
	function delete($id){
		$this->general_db_model->delete('testimonials','id = '.$id);
	}
	
}?>