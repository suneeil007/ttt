<?php  
class Admin extends MX_Controller {
	
		function __construct(){
		parent::__construct();	
		
		$this->load->library('auth/ion_auth');
        
        //if (!$this->ion_auth->logged_in()){
//            redirect('auth/login');
//            exit();
//        }	
		$this->load->library('pagination');
		$this->load->model('booking_model'); 
	}

	
	function all(){

		$cpage['booking_data'] = $this->booking_model->get_all();		
	
	    $this->template->load('admin/admin','admin/booking', $cpage);	
	}

	function add_booking(){

			$sub_booking_data['name']   		    =  $this->input->post('name'); 
			
			$sub_booking_data['persons']            =  $this->input->post('persons');	

			$sub_booking_data['email']      	    =  $this->input->post('email'); 
	
			$sub_booking_data['contact']   		    =  $this->input->post('tel'); 

            $sub_booking_data['country']   		    =  $this->input->post('country');

            $sub_booking_data['arrivalDate']   	    =  $this->input->post('arrivalDate');  

            $sub_booking_data['description']   		=  $this->input->post('description'); 
			
			$this->general_db_model->insert('booking', $sub_booking_data);

            redirect(base_url());

                   
		}

  	function details($id){
		$booking_data['bookingDetail'] = $this->general_db_model->getById( 'booking', 'id', $id) ;		
		
		$this->template->load('admin/admin','admin/booking_detail', $booking_data);		
	}


	function delete($id){
		$res = 	$this->general_db_model->getById('booking','id', $id) ;	
			if($res->photo !=''){			
				unlink(APPLICATIONS_DIR.'/'.$res->photo) ;		
			}
		
		$this->general_db_model->delete('booking','id = '.$id);
	}
		
}