<?php  
class Admin extends MX_Controller {
	
		function __construct(){
		parent::__construct();	
		
		$this->load->library('auth/ion_auth');
        
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login');
            exit();
        }	
		$this->load->model('packages_model'); 
	//	$this->load->model('category/category_model'); 		
		$this->load->helper('ckeditor_helper');
	
	}

	function all($parent_cat_id = NULL, $sub_cat_id = NULL , $product_id = NULL){
		
		$product_data['ckeditor'] 	= array(
 
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



        		$product_data['ckeditor_3'] 	= array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'description3',
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


      		$product_data['ckeditor_4'] 	= array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'description4',
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
       		$product_data['ckeditor_5'] 	= array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'description5',
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


		$product_data['categories'] = $this->general_db_model->get_ByTbl_Col('categories','parent_id', 0);	
		
		//If parent category is chosen 
		if($parent_cat_id && $parent_cat_id != '-1' && $sub_cat_id == '-1' || $sub_cat_id == '0'){
			$product_data['products']     = $this->general_db_model->get_ByTbl_Col('products','cat_id', $parent_cat_id);
			
			if(isset($product_data['products']) && count($product_data['products'])>0){
				foreach($product_data['products'] as $row){
					$product_data['parentcategory'][$row->id] = $this->general_db_model->getById('categories','id', $row->cat_id) ; 
				}
			}	
						
		//If sub category is chosen and parent category is set
		}elseif($sub_cat_id || $sub_cat_id != '-1' || $sub_cat_id != '0' && $parent_cat_id){
			$product_data['products']      = $this->general_db_model->get_ByTbl_Col('products','cat_id', $sub_cat_id);							
			
			if(isset($product_data['products']) && count($product_data['products'])>0){
				foreach($product_data['products'] as $row){
					$product_data['parentcategory'][$row->id] = $this->general_db_model->getById('categories','id', $row->cat_id) ; 
				}
			}				
		}
		
		//If product is in edit mode
		if($product_id){			
			$product_data['product_row'] 	  		 = $this->general_db_model->getById('products','id', $product_id);		
			$product_data['product_veriety_row']     = $this->general_db_model->get_ByTbl_Col('product_veriety','product_id', $product_id);	
			$product_data['product_color_row']       = $this->general_db_model->get_ByTbl_Col('product_color','product_id', $product_id);	
			$product_data['product_choice']       	 = $this->general_db_model->getById('product_choice_type','product_id', $product_id);			
		}
		
		$this->template->load('admin/admin', 'admin/products', $product_data);		
	}
	
	function add_edit_product(){
		$p_id				   		= $this->input->post('p_id' , true); 
			
 //'username' => strtolower($this->input->post('username')),

//	(str_replace('-', '_', $seg));

		$pro_data['name']   		 = $this->input->post('name' , true);		
		$pro_data['description']     = $this->input->post('description', true);		
        $pro_data['description3']    = $this->input->post('description3', true);	
        $pro_data['description4']    = $this->input->post('description4', true);	
        $pro_data['description5']    = $this->input->post('description5', true);	
      //  $pro_data['description']    = $this->input->post('description', true);	   
		$pro_data['model']   		= $this->input->post('model', true); 
        $pro_data['slug']   		= strtolower(trim(str_replace(' ', '-',($this->input->post('name', true)))));  
		
		if($this->input->post('sub_category') == '-1' || $this->input->post('sub_category') == 0){
			$pro_data['cat_id']    		= $this->input->post('category', true);		
		}else{
			$pro_data['cat_id']    		= $this->input->post('sub_category', true);		
		}
		$pro_data['dimension']   	= $this->input->post('dimension', true); 
		$pro_data['order']    		= $this->input->post('order', true);		
		$pro_data['price']   		= $this->input->post('price', true); 
		$pro_data['currency']   	= $this->input->post('currency', true); 
		$pro_data['date'] 		    = date('Y-m-d');		
		$pro_data['hide_price'] 	= 'no';
		
		if($this->input->post('price_publish')){
			$pro_data['hide_price'] = 'yes';
		}
			
		//featured product image
		if (!empty($_FILES['product_image']['name'])) {		
			if($p_id){
				$res = 	$this->general_db_model->getById('products','id', $p_id) ;	
					if(!empty($res->image)){
						$this->deleteImage($p_id) ;
					}
				}
				
				$pimage_data =	uploadfile('product_image', 'jpeg|jpg|png|gif' , PRODUCTS_DIR , 2000); 			
				
				$filename = $pimage_data['raw_name'].$pimage_data['file_ext'];						
				$pro_data['image'] = $filename;
			}
		
		// Insert Mode
		if(!$p_id){
			$id  =  $this->general_db_model->insert('products', $pro_data);
			
			//upload product veriety	
			$up_dat = do_multiple_upload('userfile1',VERITIES_DIR, 'jpeg|jpg|png|gif', 2000);		
			
			if($up_dat != false && $id){
					foreach ($up_dat as $file) {  
						foreach ($file as $item => $value) {     
	
						$up_data['image'] 		= $value;
						$up_data['product_id']  = $id;					
						
						$this->general_db_model->insert('product_veriety', $up_data);			
					} 
				}			
			}
			
			//upload product colors
			$color_data   = do_multiple_upload('userfile2',COLORS_DIR, 'jpeg|jpg|png|gif', 2000);	
			if($color_data != false && $id){
				foreach ($color_data as $file) {  
			 		foreach ($file as $item => $value) {     

					$col_data['image'] 		 = $value;
					$col_data['product_id']  = $id;					
					
					$this->general_db_model->insert('product_color', $col_data);			
				} 
			}			
		}		
			
			//show product as best sellin/editor's choice/new arrival
			if($this->input->post('choice')){
			
				$choice_data['product_type'] 		= $this->input->post('choice');
				$choice_data['product_id'] 			= $id;
			
			if($this->general_db_model->row_exist('product_choice_type', array('product_id' => $id))){
			
				$this->general_db_model->delete('product_choice_type', array('product_id' => $id));
										
			}
				$this->general_db_model->insert('product_choice_type', $choice_data);		
		}
				// Edit Mode
		}else{
			$this->general_db_model->update('products', $pro_data , array('id'=> $p_id));	
			
			//upload product veriety	
			$up_dat = do_multiple_upload('userfile1',VERITIES_DIR, 'jpeg|jpg|png|gif', 2000);		
			if($up_dat != false){
					foreach ($up_dat as $file) {  
						foreach ($file as $item => $value) {     
	
						$up_data['image'] 		= $value;
						$up_data['product_id']  = $p_id;					
						
						$this->general_db_model->insert('product_veriety', $up_data);			
					} 
				}			
			}
			
			//upload product colors
			$color_data   = do_multiple_upload('userfile2',COLORS_DIR, 'jpeg|jpg|png|gif', 2000);
			
			if($color_data != false){
				foreach ($color_data as $file) {  
			 		foreach ($file as $item => $value) {     

					$col_data['image'] 		 = $value;
					$col_data['product_id']  = $p_id;					
					
					$this->general_db_model->insert('product_color', $col_data);			
				} 
			}	
		}	
		
		//show product as best sellin/editor's choice/new arrival
			if($this->input->post('choice')){
			
				$choice_data['product_type'] 		= $this->input->post('choice');
				$choice_data['product_id'] 			= $p_id;
			
			if($this->general_db_model->row_exist('product_choice_type', array('product_id' => $p_id))){
			
				$this->general_db_model->delete('product_choice_type', array('product_id' => $p_id));
										
			}
				$this->general_db_model->insert('product_choice_type', $choice_data);		
		}		
	  }
	}
	
	// Delete FEATURED image
	function deleteImage($id) {	
		$picture = $this->general_db_model->getById('products', 'id', $id);
		
		unlink(PRODUCTS_DIR.'/'.$picture->image) ;
	
		$this->general_db_model->_custom_query('UPDATE  products SET image = "" WHERE id =' .$id);	
	}
	
	// Delete product veriety image
	function delete_veriety($id) {			
		$this->product_model->delete_product_variety($id);
				
	}
	
	// Delete product color image
	function delete_color($id) {			
		$this->product_model->delete_product_color($id);
				
	}
	
	//Delete product	
	function delete($id){
		$cms 				   = $this->general_db_model->getById( 'products', 'id', $id);
		$product_verieties     = $this->general_db_model->get_ByTbl_Col('product_veriety','product_id', $id);	
		$product_colors        = $this->general_db_model->get_ByTbl_Col('product_color','product_id', $id);
		
			if(!empty($cms->image)){				
				unlink(PRODUCTS_DIR.'/'.$cms->image) ;
			}
			
			if($product_verieties){
				foreach($product_verieties as $pv){
					$this->product_model->delete_product_variety($pv->id);
				}
			}
			
			if($product_colors){
				foreach($product_colors as $pc){
					$this->product_model->delete_product_color($pc->id);
				}
			}
			
		$this->general_db_model->delete('products','id = '.$id);
	}
		
		// get parent groups
	function get_sub_categories($id){
      header('Content-Type: application/x-json; charset=utf-8');
      echo(json_encode($this->category_model->get_sub_categories($id)));
	}
	
	
	function price_status($id){
		$this->product_model->price_status($id) ;						   
	  } 
		
	}
?>