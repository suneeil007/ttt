<?php  
class Admin extends MX_Controller {

    public $data 	= 	array();

	function __construct(){
		parent::__construct();	
		
		$this->load->library('auth/ion_auth');
        
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login');
            exit();
        }	

		$this->data['menu_types'] = $this->dynamic_menu->getAll() ;
		
		$this->load->helper('ckeditor_helper');
		
		$this->load->helper('cms_helper');
		$this->load->model('cms_group_model'); 
		
		$this->load->model('imagegallery/imagegallery_model'); 		
		$this->load->model('contentpage/contentpage_model'); 

		
		//Ckeditor's configuration
		$this->data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'shortcontents',
			'path'	=>	'assets/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"standard", 	//Using the Full toolbar
				'width' 	=> 	"650px",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
 
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
 
		$this->data['ckeditor_2'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'contents',
			'path'	=>	'assets/js/ckeditor',
 
			//Optionnal values	
		 'config' => array(
				'toolbar' 	=> 	"standard", 	//Using the Full toolbar
				'width' 	=> 	"650px",	//Setting a custom width
				'height' 	=> 	'200px',	//Setting a custom height
				
		 'filebrowserBrowseUrl' => base_url() . 'assets/js/ckeditor/ckfinder/ckfinder.html',
          'filebrowserImageBrowseUrl' => base_url() . 'assets/js/ckeditor/ckfinder/ckfinder.html?Type=Images',
          'filebrowserFlashBrowseUrl' => base_url() . 'assets/js/ckeditor/ckfinder.html?Type=Flash',
          'filebrowserUploadUrl' => base_url() . 'assets/js/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
          'filebrowserImageUploadUrl' => base_url() . 'assets/js/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
          'filebrowserFlashUploadUrl' => base_url() . 'assets/js/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 3' => array (
					'name' 		=> 	'Green Title',
					'element' 	=> 	'h3',
					'styles' => array(
						'color' 	=> 	'Green',
						'font-weight' 	=> 	'bold'
					)
				)
 
			)
		);		
		$this->data['lastrow']	= $this->cms_group_model->get_max();
		
		$this->data['last_data'] = $this->general_db_model->getById( 'cms_groups', 'id', $this->data['lastrow']) ;
	}

    // show all pages
	function all($type=1,$parentId=0){	
		
//		$this->data['sitename'] = SITE_NAME ;

		if($parentId==0){
			$this->data['pages'] =	$this->cms_group_model->getByTypeParentId($type, $parentId) ;			
		}else{
			$this->data['pages'] =	$this->cms_group_model->getByParentId($parentId) ;			
			
		$upRow = $this->general_db_model->getById( 'cms_groups', 'id', $parentId);			
			$this->data['up_Rows'] = $upRow ;	
		}
		
			foreach($this->data['pages'] as $parentRows){
				$this->data['pRows'][$parentRows->id] = $this->cms_group_model->count_where('parent_id', $parentRows->id); 
			}
		
		$this->data['mtype'] = $type ;
		$this->data['pid'] = $parentId ;
		
		$this->data['group_name'] = '';
		
		if($type!= 0){
		$this->data['group_name'] = $this->get_GroupNameById($type) ;
		}
		
		$this->template->load('admin/admin','admin/all_pages', $this->data);		
	}
	
	function create(){		
		
		$this->template->load('admin/admin','admin/add_edit', $this->data);
		if($_POST){			

		if($this->input->post('content_type') == 'Content Page'){		
					$this->add_edit();					
			}
		elseif($this->input->post('content_type') == 'Image Gallery'){
					$this->add_edit_gallery();					
			}	
		elseif($this->input->post('content_type') == 'Link'){
					$this->add_edit_link();					
			}
		elseif($this->input->post('content_type') == 'File'){
					$this->add_edit_file();					
			}
		elseif($this->input->post('content_type') == 'Video Gallery'){
				    $this->add_edit_video_gallery();					
			}
	set_success_msg('all_pages', 'New Page Successfully Added !');

		} 
 }
	
	function update($pid){			
		$this->data['pages'] = $this->general_db_model->getById( 'cms_groups', 'id', $pid) ;		

		if($this->data['pages']->link_type == 'Content Page'){
			$this->data['groupfiles'] =  $this->general_db_model->get_ByTbl_Col( 'groupfiles', 'groupId', $pid);

			$this->data['PRows'] = $this->cms_group_model->count_where('parent_id',$pid); 

		}
		elseif($this->data['pages']->link_type == 'Image Gallery'){
			$this->data['galleryimages'] =  $this->imagegallery_model->getByparentIdwithorder( $this->uri->segment(4));
		}
		
		elseif($this->data['pages']->link_type == 'Video Gallery'){
			$this->data['videoLinks'] =  $this->general_db_model->get_ByTbl_Col( 'videos', 'groupId', $pid);
			
			foreach($this->data['videoLinks'] as $videos){
				$this->data['youtubeimages'][$videos->id] = video_image($videos->url); 
			}  
		}

		$this->template->load('admin/admin','admin/add_edit', $this->data);

		if($_POST){					
		if($this->data['pages']->link_type == 'Content Page'){
			$this->add_edit($pid);
			}
			
		elseif($this->data['pages']->link_type == 'Image Gallery'){
			$this->add_edit_gallery($pid);	
		}
		
		elseif($this->data['pages']->link_type == 'Link'){
			$this->add_edit_link($pid);	
		}
		
		elseif($this->data['pages']->link_type == 'File'){
			$this->add_edit_file($pid);	
		}
		
		elseif($this->data['pages']->link_type == 'Video Gallery'){
			$this->add_edit_video_gallery($pid);	
		}
		
	set_success_msg('all_pages', 'Page Successfully Updated !');
	}	
 }
	
	function add_edit($pid=NULL){					   
	
            $pid = $this->input->post('pid');

			//get posted data			
			$data_cpage = $this->get_data_from_post() ;		    
			
			$up_dat ='';
			
			if (!empty($_FILES['userfile']['name'])){			
				$up_dat = $this->contentpage_model->do_upload();						
			}

			$captionList = $this->input->post('fileCaption') ;
		
			if($pid){
					
				$this->general_db_model->update('cms_groups', $data_cpage, array("id"=>$pid));	

				//upload files			
			if($up_dat != $error)
			{
				$i=0;
				foreach ($up_dat as $file) {  
			 		foreach ($file as $item => $value) {     

					$up_data['caption'] = $captionList[$i];
					$up_data['filename'] = $value;
					$up_data['groupId'] = $pid;
					$up_data['onDate'] = date('Y-m-d');
					
					$this->general_db_model->insert('groupfiles', $up_data);
				
				$i = $i+1 ;
				} 
			}			
	 	}

	}
			else{			
			
			$id = $this->general_db_model->insert('cms_groups', $data_cpage);			
			
			//upload files			
			if($up_dat != $error)
			{
				$j=0;
				foreach ($up_dat as $file) {  
			 		foreach ($file as $item => $value) {     

					$up_data['caption'] = $captionList[$j];
					$up_data['filename'] = $value;
					$up_data['groupId'] = $id;
					$up_data['onDate'] = date('Y-m-d');
					
					$this->general_db_model->insert('groupfiles', $up_data);
				
				$j = $j+1 ;
				} 
			}			
	 	}					
	}}	
	
	function add_edit_file($pid=NULL){					   
	
            $pid = $this->input->post('pid');

			//get posted data			
			$data_cpage = $this->get_data_from_post() ;		    
			
			if (!empty($_FILES['file_upload']['name'])) {

				if($pid){
				$res = 	$this->general_db_model->getById('cms_groups','id',$pid) ;	
					if($res->contents !=''){
						$this->deleteUp_File($pid) ;
					}
				}
				
				$pimage_data =	$this->upload_file();						
				
				$filename = $pimage_data['raw_name'].$pimage_data['file_ext'];						
				$data_cpage['contents'] = $filename;
			}			
			
			if($pid){
					
				$this->general_db_model->update('cms_groups', $data_cpage, array("id"=>$pid));	
	}
			else{			
			
			$id = $this->general_db_model->insert('cms_groups', $data_cpage);											
		}
	}	
	
	function add_edit_gallery($pid=NULL){			
		   
            $pid = $this->input->post('pid');
			
			// get posted data
			$data_cpage = $this->get_data_from_post() ;
			   
			// image upload
			$up_dat = $this->imagegallery_model->do_upload_gallery();						

			$captionList = $this->input->post('listCaption') ;
						
			if($pid){
				$this->general_db_model->update('cms_groups', $data_cpage, array("id"=>$pid));	
			
				$oldCaptions = $this->input->post('oldCaptionIds') ;
				$weight = $this->input->post('galSort') ;
				
				  for ($i=0; $i < count($oldCaptions); $i++)
				  {
					$cap_data['caption'] = $captionList[$i];
					$cap_data['weight'] = $weight[$i];
					
				   	$this->general_db_model->update('galleries', $cap_data, array("id"=>$oldCaptions[$i]));					
				  }	
				  
			 	
			if($up_dat != $error)
			{
				
				$j=  count($captionList) - 1;
				foreach ($up_dat as $file) {  
			 		foreach ($file as $item => $value) {     

					$up_data['caption'] = $captionList[$j];
					$up_data['image']   = $value;
					$up_data['groupId'] = $pid;
					$up_data['onDate']  = date('Y-m-d');
					
					$this->general_db_model->insert('galleries', $up_data);
				
				$j = $j-1 ;
				} 
			}			
	 	}
		
	}
		else{
				$id = $this->general_db_model->insert('cms_groups', $data_cpage);	
				
			if($up_dat != $error)
			{
				$k=0;
				foreach ($up_dat as $file) {  
			 		foreach ($file as $item => $value) {     

					$up_data['caption']  = $captionList[$k];
					$up_data['image']    = $value;
					$up_data['groupId']  = $id;
					$up_data['onDate']   = date('Y-m-d');
					
					$this->general_db_model->insert('galleries', $up_data);
				
				$k = $k+1 ;
				} 
			}			
	 	}
				
	}}

	function add_edit_video_gallery($pid=NULL){			
		   
            $pid = $this->input->post('pid');
			
			// get posted data
			$data_cpage = $this->get_data_from_post() ;
			
			$data_cpage['link_type'] = 'Video Gallery';
			   
			$titleList = $this->input->post('title_vid') ;
			$linkList = $this->input->post('vid_link') ;
			
			if($pid){
				$this->general_db_model->update('cms_groups', $data_cpage, array("id"=>$pid));	
			
				$oldCaptions = $this->input->post('OldVideoIds') ;
				
				$OldtitleList = $this->input->post('Oldtitle_vid') ;
				$OldlinkList = $this->input->post('Oldvid_link') ;

				
				  for ($z=0; $z < count($oldCaptions); $z++) {
					$cap_data['title'] = $OldtitleList[$z];
					$cap_data['url']   = $OldlinkList[$z];
					
				   	$this->general_db_model->update('videos', $cap_data, array("id"=>$oldCaptions[$z]));					
				 }

				  for($l=0; $l < count($linkList); $l++) {  
					
					$new_up_data['title']   = $titleList[$l];
					$new_up_data['url']     = $linkList[$l];
					$new_up_data['groupId'] = $pid;
					$new_up_data['onDate']  = date('Y-m-d');
					
					if($new_up_data['url'] != ''){					
						$this->general_db_model->insert('videos', $new_up_data);	
					}	
				  }		
				}		
			 
			else{
				$id = $this->general_db_model->insert('cms_groups', $data_cpage);	

				for($g=0; $g < count($linkList); $g++) {  
					$up_data['title'] = $titleList[$g];
					$up_data['url'] = $linkList[$g];
					$up_data['groupId'] = $id;
					$up_data['onDate'] = date('Y-m-d');
					
					$this->general_db_model->insert('videos', $up_data);				
				} 
			}			
	 	}

	function add_edit_link($pid=NULL){					   
	
            $pid = $this->input->post('pid');

			//get posted data			
			$data_cpage = $this->get_data_from_post() ;		    
			$data_cpage['contents'] = $this->input->post('linkpage');
			
			
			if($pid){
					
				$this->general_db_model->update('cms_groups', $data_cpage, array("id"=>$pid));	
			}
			else{			
			
			$id = $this->general_db_model->insert('cms_groups', $data_cpage);													
		}
	}


	// get all posted data
    function get_data_from_post(){
	$data_cms['cms_grouptype_id'] = $this->input->post('menu_type',TRUE);
	$data_cms['title'] = $this->input->post('title',TRUE);
			
	$data_cms['shortcontents'] = $this->input->post('shortcontents',TRUE);
	$data_cms['contents'] = $this->input->post('contents',TRUE);		
			
	if($this->input->post('lt')){
		$data_cms['link_type'] = $this->input->post('lt',TRUE);
	}
	else{
		$data_cms['link_type'] = $this->input->post('content_type',TRUE);
	}
	$data_cms['parent_id'] = $this->input->post('parent',TRUE);
	
	if($this->input->post('oldisparent')){
		$data_cms['is_parent'] =  $this->input->post('oldisparent',TRUE) ;
	}
	else{
		$data_cms['is_parent'] =  $this->input->post('isparent',TRUE) ;
	}
	
	$data_cms['is_listpage'] = $this->input->post('makelist',TRUE);

	$data_cms['weight'] = $this->input->post('weight',TRUE);
	$data_cms['publish'] = $this->input->post('publish',TRUE);

	$data_cms['onDate'] = date('Y-m-d');	
	
	$pid = '';
	
	if($this->input->post('pid')){
		$pid = $this->input->post('pid',TRUE);
	}
	
	if (!empty($_FILES['featured_image']['name'])) {

				if($pid){
				$res = 	$this->general_db_model->getById('cms_groups','id', $pid) ;	
					if($res->photo !=''){
						$this->deleteImage($pid) ;
					}
				}
				
				$pimage_data =	$this->contentpage_model->upload_image();				
				
				$filename = $pimage_data['raw_name'].$pimage_data['file_ext'];						
				$data_cms['photo'] = $filename;
			}	
	
	return $data_cms;
 }	
 	
	//file type  page
	function upload_file(){	

			$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png|pdf|doc|word|txt|xls',
			'upload_path' => FILES_DIR,
			'max_size' => 140000,
			'encrypt_name' => true	);				
	
			$this->load->library('upload');
			
			$this->upload->initialize($config); 	
			
			$this->upload->do_upload('file_upload');			
			
			$pimage_data = $this->upload->data();			
			
		return $pimage_data ;
	}	

	function deleteVideo($id) {	
		$this->general_db_model->delete('videos', 'id = '.$id);	
	}	
	
	// Delete file 
	function deleteUp_File($id) {	
		$upFile = $this->general_db_model->getById( 'cms_groups', 'id', $id);

		unlink(FILES_DIR.'/'.$upFile->contents) ;

		$this->cms_group_model->_custom_query('UPDATE  cms_groups SET contents = "" WHERE id =' .$id);	
	}

	// Delete content page
	function delete($id){
		$cms = $this->general_db_model->getById( 'cms_groups', 'id', $id);
		
		if($cms->link_type == 'Content Page'){
			if($cms->photo != ''){	
			// delete featured image
				unlink(GROUPS_DIR.'/'.$cms->photo) ;
			}	
			
			$gfiles = $this->general_db_model->get_ByTbl_Col('groupfiles','groupId',$id); 				
			if($gfiles){
				foreach($gfiles as $group_file){
					$this->deleteFile($group_file->id);
				}
			}
		}
		
		if($cms->link_type == 'Image Gallery'){
			$ifiles = $this->general_db_model->get_ByTbl_Col('galleries','groupId',$id); 				
			if($ifiles){
				foreach($ifiles as $gall){
					$this->deleteGallImg($gall->id);
				}
			}
		}
		
		if($cms->link_type == 'Video Gallery'){
			$vfiles = $this->general_db_model->get_ByTbl_Col('videos','groupId',$id); 				
			if($vfiles){
				foreach($vfiles as $vid){
					$this->deleteVideo($vid->id);
				}
			}
		}
		
		if($cms->link_type == 'File'){
			unlink(FILES_DIR.'/'.$cms->contents) ;
		}		
		
		$this->general_db_model->delete('cms_groups', 'id = '.$id);	
		
		set_success_msg('all_pages', 'Page Successfully Deleted !');
	}
	
	function deleteImage($id) {	
		$this->contentpage_model->deleteImage($id);
	}

	// Delete content page files
	function deleteFile($id){
		$file = $this->general_db_model->getById( 'groupfiles', 'id', $id);

		unlink(GROUP_FILES_DIR.'/'.$file->filename) ;
		
		$this->general_db_model->delete('groupfiles', 'id = '.$id);				

	}

	//Delete gallery image
	function deleteGallImg($id) {	
		$this->imagegallery_model->deleteGallImg($id) ;		
	}
		
	// Get group name
	function get_GroupNameById($id){
		$group_names = $this->general_db_model->getById( 'cms_grouptypes', 'id', $id);		
		return  $group_names->title ;
	}
	
	// get parent groups
	function get_cms_groups($id){
      header('Content-Type: application/x-json; charset=utf-8');
      echo(json_encode($this->cms_group_model->get_groups($id)));
	}
	  
	 // Get last weight  
	function lastWeight($type, $parentId){
		return $this->cms_group_model->get_Last_Weight($type, $parentId);	
	}
	
	function change_status($tid){
		$this->cms_group_model->publish_unpublish($tid);				
	}  
	
}
