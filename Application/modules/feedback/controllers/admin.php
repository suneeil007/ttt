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
		$this->load->model('feedback_model'); 

	}

	function all(){
		$cpage['feedbacks'] = $this->feedback_model->get_all();		
		$this->template->load('admin/admin','admin/feedbacks_all', $cpage);		
	}

	function details($id){
		$feed_data['feedetail'] = $this->general_db_model->getById( 'feedbacks', 'id', $id) ;		
		
		$this->template->load('admin/admin','admin/feedback_detail', $feed_data);		
	}
	
	function delete($id){
		$this->general_db_model->delete('feedbacks','id = '.$id);
	}
	

}?>