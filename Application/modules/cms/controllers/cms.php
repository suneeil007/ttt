<?php 
class Cms extends MX_Controller {
  
	function __construct(){
		parent::__construct();	
		
		$this->load->library('pagination');	
		$this->load->library('breadcrumbs');
		
		$this->load->helper('cms_helper');		
		$this->load->helper('ckeditor_helper');				
		
		$this->load->model('cms_group_model'); 
		$this->load->model('imagegallery/imagegallery_model'); 
		$this->load->model('videogallery/videogallery_model'); 
		$this->load->model('contentpage/contentpage_model');		
		$this->load->model('testimonial/testimonial_model');
		$this->load->model('product/product_model');
		$this->load->model('category/category_model');	
        $this->load->model('blog/blog_model');	
        $this->load->model('packages/packages_model');	
        $this->load->helper('text'); // this is for truncate text 
        $this->load->model('product/product_model');
		$this->load->model('category/category_model');	
 

     	$data['blog_data'] = $this->blog_model->get_all();	


       // $data['prod_data'] = $this->product_model->get_all1();	

        $data['testiFront'] = $this->testimonial_model->get_LatestTests();

        $data['blogFront'] = $this->blog_model->get_LatestBlog();


//$this->load->view('product/products', $c_data);	

		$this->load->library('categories');	
		//front animation images
		$data['animation_images']    	  =  $this->general_db_model->get_ByTbl_Col('galleries','groupId', ANIM_IMAGES_ID);
		
		//Advertisements
	//	$data['ad_images']    	  		  =  $this->general_db_model->get_ByTbl_Col('galleries','groupId', ADVERTISEMENTS_ID);		
		
		//footer categories	
		$data['footer_categories']       = $this->category_model->getByParentId_withLimit(0, 5);


		//print_r($this->category_model->getByParentId_withLimit(0, 5)); die;			
		
		//sub categories by parent category
		if(isset($data['footer_categories']) && count($data['footer_categories'])>0){
		foreach($data['footer_categories'] as $row){
				$data['sub_categories_rows'][$row->id]  = $this->category_model->getByParentId_withLimit($row->id, 5);	
			}
		}
			
		$data['about_us']	       = $this->general_db_model->getById('cms_groups','id', ABOUT_US_ID);	
		$data['contact_us']	       = $this->general_db_model->getById('cms_groups','id', CONTACT_US_ID);			
		$data['faqs']	           = $this->general_db_model->getById('cms_groups','id', FAQS_ID);		
        $data['home']	           = $this->general_db_model->getById('cms_groups','id', HOME_ID);
        $data['intro']	           = $this->general_db_model->getById('cms_groups','id', INTRO_ID);	
        $data['team']	           = $this->general_db_model->getById('cms_groups','id', TEAM_ID);	
        $data['legal']	           = $this->general_db_model->getById('cms_groups','id', LEGAL_ID);	
        $data['whyUs']	           = $this->general_db_model->getById('cms_groups','id', WHY_ID);
        $data['guide']	           = $this->general_db_model->getById('cms_groups','id', TREKING_ID);
        $data['contact']	       = $this->general_db_model->getById('cms_groups','id', CONTACT_US_ID);
        $data['test']	           = $this->general_db_model->getById('cms_groups','id', TEST);		

        $data['aboutNepal']	               = $this->general_db_model->getById('cms_groups','id', ABOUT_NEPAL_ID);
        $data['travellingInfo']	           = $this->general_db_model->getById('cms_groups','id', TRAVELLING_INFO);
        $data['safety']	                   = $this->general_db_model->getById('cms_groups','id', SAFETY_ID);
     //   $data['travelling_gallery']	       = $this->general_db_model->getById('cms_groups','id', TRAVELLING_GALLERY);	
        $data['travelling_gallery']        =  $this->cms_group_model->getCMSPage(TRAVELLING_GALLERY);	

        $data['popular_products']          =  $this->product_model->get_popular_products();	

        $data['random_products']          =  $this->product_model->get_random_products();

        $data['random_productss']          =  $this->product_model->getProductByParentId(111);





				
		$this->load->vars($data) ;

       
//print_r($this->product_model->getProductByParentId(111)); die();
  
	}


	
	function index(){			
		$cpage['title']                     =  '';
		
		$cpage['content']                   = '';

		$cpage['breadcrumb']                = '';

		$cpage['popular_products']          =  $this->product_model->get_popular_products();	

        $cpage['travelling_gallery']        =  $this->cms_group_model->getCMSPage(TRAVELLING_GALLERY);	

   //   $cpage['blogFront'] = $this->blog_model->get_LatestBlog();

	
		//for product's category
		if(isset($cpage['popular_products']) && count($cpage['popular_products'])>0){
		foreach($cpage['popular_products'] as $product){
				$cpage['pop_product_category'][$product->id]  = $this->general_db_model->getById('categories','id',$product->cat_id);
			}
		}
		
		$cpage['best_selling_product']    =  $this->product_model->get_chosed_product('best selling',1);			
		$cpage['editor_choice_product']   =  $this->product_model->get_chosed_product('editor choice',1);			
		$cpage['new_arrival_product']     =  $this->product_model->get_chosed_product('new arrival',1);							
	
		$cpage['all_categories']    	  =  $this->general_db_model->getAll('categories','order', array('parent_id'=>0));


   
		
			
		//start entering into inner pages 
		if($this->uri->segment(2) !='' && $this->uri->segment(3) != ''){

				$cpage['data_cms']    		 =  $this->cms_group_model->getCMSPage($this->uri->segment(3)) ;					
				
              
  //for title
                $cpage['title'] = $cpage['data_cms']->title;
			//	$cpage['page_key'] = $cpage['data_cms']->page_key;
			//	$cpage['page_desc'] = $cpage['data_cms']->page_desc;


				// for breadcrumb 				
				if($cpage['data_cms']->parent_id != 0){
					$cpage['breadcrumb'] = $this->cms_group_model->BreadCrumbs($this->uri->segment(3)) ;
				}			
			//start contentpage
				if($cpage['data_cms']->link_type == 'Content Page'){	 	
					
					if($cpage['data_cms']->is_listpage == 'yes' && $cpage['data_cms']->is_parent == '1'){

					$lp =  $this->cms_group_model->count_where('parent_id',$cpage['data_cms']->id);
						
					$config['base_url'] = base_url().'pages/'.urldecode(url_title($cpage['data_cms']->title)).'/'.$cpage['data_cms']->id; 
					$config['total_rows'] = $lp; 
					$config['per_page'] = '4'; 
					$config['uri_segment'] = 4; 
					
					$config['first_link'] = 'First';
					$config['last_link'] = 'Last';
					
					$config['full_tag_open'] = '<div class="pagination">';
					$config['full_tag_close'] = '</div>';
					
					$this->pagination->initialize($config); //initialize pagination
				
 		$cpage['listpages'] = $this->contentpage_model->get_listpages($config['per_page'],$this->uri->segment(4),$cpage['data_cms']->id);	
				
						$this->template->load('front/index','contentpage/listpage', $cpage);
						
					} elseif($cpage['data_cms']->is_listpage == 'yes' && $cpage['data_cms']->is_parent == '0'){						
					
						$this->template->load('front/index','contentpage/list_single', $cpage);												
						
					}else{
					
				$cpage['groupfiles'] 		=  $this->general_db_model->get_ByTbl_Col( 'groupfiles', 'groupId', $cpage['data_cms']->id);								
					$this->template->load('front/index','contentpage/contentpage', $cpage);	
					
				 }
				} // end contentpage
				elseif($cpage['data_cms']->link_type == 'Image Gallery'){	
				
					$a = $this->imagegallery_model->count_all('groupId',$cpage['data_cms']->id);
					
					$config['base_url'] = base_url().'pages/'.urldecode(url_title($cpage['data_cms']->title)).'/'.$cpage['data_cms']->id; //set the base url for pagination
					$config['total_rows'] = $a; //total rows
					$config['per_page'] = '20'; //the number of per page for pagination
					$config['uri_segment'] = 4; //see from base_url. 3 for this case
					
					$config['first_link'] = 'First';
					$config['last_link'] = 'Last';
					
					$config['full_tag_open'] = '<div class="pagination">';
					$config['full_tag_close'] = '</div>';
		
					$this->pagination->initialize($config); //initialize pagination
		
					$cpage['galleryimages'] = $this->imagegallery_model->get_all($config['per_page'],$this->uri->segment(4),$cpage['data_cms']->id);
					
					$this->template->load('front/index','imagegallery/imagegallery', $cpage);	
				}			
				elseif($cpage['data_cms']->link_type == 'Video Gallery'){
					
					$b = $this->videogallery_model->count_all('groupId',$cpage['data_cms']->id);
					
					$config['base_url'] = base_url().'pages/'.urldecode(url_title($cpage['data_cms']->title)).'/'.$cpage['data_cms']->id; //set the base url for pagination
					$config['total_rows'] = $b; //total rows
					$config['per_page'] = '4'; //the number of per page for pagination
					$config['uri_segment'] = 4; //see from base_url. 3 for this case
					
					$config['first_link'] = 'First';
					$config['last_link'] = 'Last';
					
					$config['full_tag_open'] = '<div class="pagination">';
					$config['full_tag_close'] = '</div>';
										
					$this->pagination->initialize($config); //initialize pagination
		
					$cpage['videoLinks'] = $this->videogallery_model->get_all($config['per_page'],$this->uri->segment(4),$cpage['data_cms']->id);
					
					foreach($cpage['videoLinks'] as $videos){
						$cpage['youtubeimages'][$videos->id] = video_image($videos->url); 
					} 
					
					$this->template->load('front/index','videogallery/videogallery', $cpage);	
				}
				elseif($cpage['data_cms']->link_type == 'Link'){								
					if($cpage['data_cms']->contents == 'testimonial'){
					
					$cpage['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'comment',
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

					$a = $this->testimonial_model->count_tests();
					$config['base_url'] = base_url().'pages/testimonials/'.$cpage['data_cms']->id; //set the base url for pagination
					$config['total_rows'] = $a; //total rows
					$config['per_page'] = '4'; //the number of per page for pagination
					$config['uri_segment'] = 4; //see from base_url. 3 for this case
					
					$config['first_link'] = 'First';
					$config['last_link'] = 'Last';
					
					$config['full_tag_open'] = '<div class="pagination">';
					$config['full_tag_close'] = '</div>';
			
					$this->pagination->initialize($config); //initialize pagination
			
					$cpage['alltests'] = $this->testimonial_model->get_all($config['per_page'],$this->uri->segment(4));		
					$this->template->load('front/index','testimonial/testimonial', $cpage);	
					
				} elseif($cpage['data_cms']->contents == 'feedback'){
						$this->template->load('front/index','feedback/feedback', $cpage);		
					
					}else redirect($cpage['data_cms']->contents); 
				}
				elseif($cpage['data_cms']->link_type == 'File'){
					 downloadFile('./uploads/downloads/'.$cpage['data_cms']->contents);
				}
			} //end entering into inner pages
           
              
 



			else{
				$this->template->load('front/index','front/index', $cpage);	
			}	
        }
	

	function send_email(){
		    $to 			= 'suneeil_thapa@hotmail.com' ;
			$subject 		= 'Inquiry';
			$header 		= $this->input->post("name") ;
			$from           = $this->input->post("email") ;
			
			$data['quantity']   = $this->input->post("quantity") ;
			$data['phone']      = $this->input->post("phone") ;
			$data['country']    = $this->input->post("country") ;
			$data['information']            = $this->input->post("information") ;
			
			$data['product_name'] 		= $this->input->post("product_name") ;
			$data['product_model']       = $this->input->post("product_model") ;
						
			$htmlMessage    	= $this->load->view('product/success', $data, true); 
			
		    $this->load->library('email');
					
			$this->email->clear(true);
			
			$this->email->from($from, $header);
			$this->email->to($to);
			
			$this->email->subject($subject);
			$this->email->message($htmlMessage);
			
			if($this->email->send())
	//			return true;
			//	show_error($this->email->print_debugger());
			redirect('cms/confirmation', 'refresh');
			else
			//	return false;	
				// echo 'Your e-mail has been sent!';
				redirect('cms/fail', 'refresh');
		}
		
				
	function confirmation(){
		$this->load->view('product/confirmation');
	}
	
	function fail(){
		$this->load->view('product/fail');
	}

	//Product list
	function products(){

		$c_data['current_category']	       = $this->general_db_model->getById('categories','id',$this->uri->segment(3));
		
		$c_data['cat_breadcrumbs']         = '';

		// for breadcrumb 				
		if($c_data['current_category']->parent_id != 0){
			$c_data['cat_breadcrumbs'] 	   = $this->category_model->BreadCrumbs($this->uri->segment(3)) ;
		}	
				
		//Pagination
		$total_rows				       = $this->general_db_model->countTotal('products',array('cat_id' => $this->uri->segment(3))) ;					
		$per_page  			           = 9 ;		
		$base_url 				       = base_url().'products/'.decode_title($c_data['current_category']->name).'/'.$this->uri->segment(3) ;			
		
		//from custom helper function/
     	create_pagination($base_url, $total_rows, 4 , $per_page) ;	
		
		//for the list of child categories of current category
		$c_data['child_categories']    =  $this->category_model->getByParentId($this->uri->segment(3));	
		
		$c_data['products'] 	       = $this->product_model->get_all($per_page, $this->uri->segment(4), $this->uri->segment(3));
		
	//	$this->template->load('front/index','product/products', $c_data);	

        $this->load->view('product/products', $c_data);	
	}
	
	//Single Product
	function produpct($id){

	$product['product_detail']   		 = $this->general_db_model->getById('products','id', $this->uri->segment(3));       

		$this->load->view('product/product',$product);	
	}
	
	function search(){
		$data['keywords']			= $this->input->post("keyword", TRUE);
		
		$data['products'] 	        = $this->product_model->search();
				
		$this->template->load('front/index','product/search', $data);	
	}
	
	function featuredProduct(){
		
		$arr   =  explode('-', $this->uri->segment(2));
		
		$uri   = $this->uri->segment(3) ? $this->uri->segment(3) : 0 ;
		
		$chosen  =  $arr[0]." ".$arr[1];
		
		//Pagination
		$total_rows				       = count($this->product_model->get_chosed_product($chosen)) ;							
		$per_page  			           = 1 ;		
		$base_url 				       = base_url().'featuredProduct/'.$this->uri->segment(2);			
		
		//from custom helper function/
     	create_pagination($base_url, $total_rows, 3 , $per_page) ;					
		
		$featured['products'] 	       = $this->product_model->get_all_chosed_product($chosen, $per_page , $uri);

		$this->template->load('front/index','product/featured_products', $featured);	
	}


       function testimonialFront(){


        echo $this->db->last_query();

         }


    	function blog1(){			

      $data['blog_data'] = $this->blog_model->get_all();		

	  $this->template->load('front/index', 'blog/blog',$data) ;	

 
	}	

   	function blog_details($id){
		$blog_data['blogdetail'] = $this->general_db_model->getById( 'blog', 'id', $id) ;		
		
        $this->load->view('blog/blog-detail',$blog_data);	
	}



	
  }
?>