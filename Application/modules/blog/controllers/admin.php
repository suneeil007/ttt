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
		$this->load->model('blog_model'); 
	}

    

	
	function all(){
 		
		$blog_data['ckeditor'] 	= array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'description',
			'path'	=>	'assets/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"standard", 	//Using the Full toolbar
				//'width' 	=> 	"570px",	//Setting a custom width
				//'height' 	=> 	'100px',	//Setting a custom height
 
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
 
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);


		$cpage['blog_data'] = $this->blog_model->get_all();		
	
	    $this->template->load('admin/admin','admin/blog', $cpage);	
	}




	function add_edit_blog(){

					
       $blog_data['title'] =  $this->input->post('title',TRUE)	;

       $filename	 = '';
			if (!empty($_FILES['image']['name'])) {
				$pimage_data =	$this->upload_blog_image();								
				$filename = $pimage_data['raw_name'].$pimage_data['file_ext'];						
			}   
       $blog_data['image'] =  $filename	; 
       $blog_data['date'] =  $this->input->post('date',TRUE)	;

       $blog_data['description'] =  $this->input->post('description',TRUE)	;
			
		
			
				$this->general_db_model->insert('blog', $blog_data);
                redirect(base_url().'admin/blog/all','refresh');
                 
		}


	
	function delete($id){
		$res = 	$this->general_db_model->getById('blog','id', $id) ;	
			if($res->photo !=''){				
				unlink(APPLICATIONS_DIR.'/'.$res->photo) ;		
			}
		
		$this->general_db_model->delete('blog','id = '.$id);
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
	
	
}