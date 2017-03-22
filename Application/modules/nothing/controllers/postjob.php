<?php 
class Postjob extends MX_Controller {

	function __construct(){
		parent::__construct();		
			$this->load->model('postjob_model'); 
	}
	
	function index(){

		if($_POST){	
		
       $job_data['job_title'] =  $this->input->post('jobtitle',TRUE)	;

       $job_data['country'] =  $this->input->post('country',TRUE)	;

       $job_data['job_category'] =  $this->input->post('categories',TRUE)	;

       $job_data['num_vacancies'] =  $this->input->post('number',TRUE)	;
   
       $job_data['salary'] =  $this->input->post('salary',TRUE)	;

       $job_data['job_description'] =  $this->input->post('description',TRUE)	;
	  	
      $this->general_db_model->insert('postjob', $job_data);		

		}		
	}	

 }