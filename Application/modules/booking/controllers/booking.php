<?php 
class Booking extends MX_Controller {

	function __construct(){
		parent::__construct();		
			$this->load->model('booking_model'); 
	}
	
	function index(){

		if($_POST){	
		
			$sub_booking_data['name']   		    =  $this->input->post('name'); 
			
			$sub_booking_data['persons']            =  $this->input->post('persons');	

			$sub_booking_data['email']      	    =  $this->input->post('email'); 
	
			$sub_booking_data['contact']   		    =  $this->input->post('tel'); 

            $sub_booking_data['country']   		    =  $this->input->post('country');

            $sub_booking_data['arrivalDate']   	    =  $this->input->post('arrivalDate');  

            $sub_booking_data['description']   		=  $this->input->post('description'); 
	  	
      $this->general_db_model->insert('booking', $booking_data);
		

		}		
	}	

 }