<?php 
class Blog extends MX_Controller {

	function __construct(){
		parent::__construct();		
			$this->load->model('blog_model'); 
	}
	
	function index(){

		if($_POST){	
		
       $blog_data['title'] =  $this->input->post('title',TRUE)	;

        	$filename	 = '';
			if (!empty($_FILES['image']['name'])) {
				$pimage_data =	$this->upload_test_image();								
				$filename = $pimage_data['raw_name'].$pimage_data['file_ext'];						
			}
			
		$blog_data['image'] =  $filename	;	
 
        $blog_data['date'] =  $this->input->post('date',TRUE)	;

       $blog_data['description'] =  $this->input->post('description',TRUE)	;
	  	
      $this->general_db_model->insert('blog', $blog_data);		

		}		
	}	
	function upload_blog_image(){	

			$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => BLOG_DIR,
			'max_size' => 4000,
			'encrypt_name' => true	);				
	
			$this->load->library('upload');
			
			$this->upload->initialize($config); 	
			
			$this->upload->do_upload('image');			
			
			$pimage_data = $this->upload->data();						

		return $pimage_data ;
	}


   	function details($id){
		$blog_data['blogdetail'] = $this->general_db_model->getById( 'blog', 'id', $id) ;		
		
	//	$this->template->load('blog/blog','blog/blog-detail', $blog_data);	

$this->load->view('blog/blog-detail',$blog_data);	
	}




 }


