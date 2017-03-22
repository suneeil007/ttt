<?php 
class Feedback extends MX_Controller {

	function __construct(){
		parent::__construct();	
		}
	
	function index(){

		if($_POST){	
		$feed_data['name'] =  $this->input->post('name',TRUE)	;
		$feed_data['address'] =  $this->input->post('address',TRUE)	;
		$feed_data['email'] =  $this->input->post('email',TRUE)	;
		$feed_data['country'] =  $this->input->post('country',TRUE)	;
		$feed_data['comment'] =  $this->input->post('comment',TRUE)	;
		
		$feed_data['onDate'] =  date('Y-m-d')	;
		
			$this->general_db_model->insert('feedbacks', $feed_data);			
		}		
	}
		
 }
?>