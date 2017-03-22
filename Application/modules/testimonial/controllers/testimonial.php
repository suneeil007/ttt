<?php 
class Testimonial extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('cms_helper');			
	
		$this->load->model('testimonial_model'); 			
		
	}
	
	function index(){	


   	function all(){
		$cpage['testimonials'] = $this->testimonial_model->get_All_tests();		
	
		//$this->template->load('admin/admin','admin/testimonial_all', $cpage);

       $this->template->load('admin/admin','views/testimonial', $cpage);	
   
    
	
	}
	

//echo "hi";


	if($_POST){
		$feed_data['name'] =  $this->input->post('name',TRUE)	;
        $feed_data['email'] =  $this->input->post('email',TRUE)	;  
 
		$filename	 = '';
			if (!empty($_FILES['test_pic']['name'])) {
				$pimage_data =	$this->upload_test_image();								
				$filename = $pimage_data['raw_name'].$pimage_data['file_ext'];						
			}
			
		$feed_data['filename'] =  $filename	;	
		$feed_data['comments'] =  $this->input->post('comment',TRUE);
		$feed_data['onDate'] =  date('Y-m-d');		

			$this->general_db_model->insert('testimonials', $feed_data);			
		}		
	}

	
	function upload_test_image(){	

			$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => TESTIMONIALS_DIR,
			'max_size' => 4000,
			'encrypt_name' => true	);				
	
			$this->load->library('upload');
			
			$this->upload->initialize($config); 	
			
			$this->upload->do_upload('test_pic');			
			
			$pimage_data = $this->upload->data();						

		return $pimage_data ;
	}
	
	
		
	function all(){
		$a = $this->general_db_model->countTotal('testimonials');

		$config['base_url'] = base_url().'pages/testimonials/'.$cpage['data_cms']->id; //set the base url for pagination
		$config['total_rows'] = $a; //total rows
		$config['per_page'] = '5'; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config); //initialize pagination

		$cpage['testimonials'] = $this->testimonial_model->get_all($config['per_page'],$this->uri->segment(4));		
	
		$this->template->load('admin/admin','admin/testimonial_all', $cpage);	
	}
	
 }
?>