<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	function video_image($url){
    $image_url = parse_url($url);
	
    if($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com'){
        $array = explode("&", $image_url['query']);
        return "http://img.youtube.com/vi/".substr($array[0], 2)."/0.jpg";
		
/*		return "http://img.youtube.com/vi/".substr($array[0], 2)."/default.jpg"; // Small Default
		return "http://img.youtube.com/vi/".substr($array[0], 2)."/0.jpg"; // Large Default
		return "http://img.youtube.com/vi/".substr($array[0], 2)."/1.jpg";
		return "http://img.youtube.com/vi/".substr($array[0], 2)."/2.jpg";
		return "http://img.youtube.com/vi/".substr($array[0], 2)."/3.jpg";
	*/	
    } else if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
        $hash = @unserialize(file_get_contents("http://vimeo.com/api/v2/video/".substr($image_url['path'], 1).".php"));
        return $hash[0]["thumbnail_small"];
		
/*		return $hash[0]["thumbnail_small"];
		return $hash[0]["thumbnail_medium"];
		return $hash[0]["thumbnail_large"]; */
    }
  }
  
    function custom_message($msg_type){
    $CI = &get_instance();
    
    if($msg_type == $CI->session->flashdata('message_type'))
    {
        if( $CI->session->flashdata('success_message'))
            return '<div><span></span>'.$CI->session->flashdata('success_message').'</div>';
        if ($CI->session->flashdata('error_message'))
            return '<div><span></span>'.$CI->session->flashdata('error_message').'</div>';
        else
            return '';
    }
}

function set_success_msg($msg_type='general', $msg="Success"){
    $CI = &get_instance();
    
    $CI->session->set_flashdata('message_type', $msg_type);
    $CI->session->set_flashdata('success_message', $msg);
}

function load_template($type, $page, $data = NULL){
		$CI = &get_instance();
		if($type == 'front'){
			if($data){
				return	$CI->template->load('front/index',$page, $data);		
			}else{
				return	$CI->template->load('front/index',$page);			
			}
		}elseif($type == 'jobseeker'){
			if($data){
				return	 $CI->template->load('jobseeker/index', $page , $data) ;
			}else{
				return	 $CI->template->load('jobseeker/index', $page) ;
			}
		}
	}



function uploadfile($name, $allowed_types, $dir, $max_size){	
		 $CI = &get_instance();
		 
			$config = array(
			'allowed_types' => $allowed_types,
			'upload_path' => $dir,
			'max_size' => $max_size,
			'encrypt_name' => true	);				
	
			$CI->load->library('upload');
			
			$CI->upload->initialize($config); 	
			
			$CI->upload->do_upload($name);			
			
			$pimage_data = $CI->upload->data();			
			
		return $pimage_data ;
	} 
	
	//upload multiple files
	function do_multiple_upload($name , $dir, $allowed_types, $max_size) {
		$CI = &get_instance();		 
		
        $config['upload_path']		 =  $dir; // server directory
        $config['allowed_types'] 	 =  $allowed_types; // by extension, will check for whether it is an image
	    $config['max_size']    		 =  $max_size ; // in kb
		
		$config['encrypt_name']   	 = 'TRUE' ;
        
        $CI->load->library('upload');
		
		$CI->upload->initialize($config); 	
		
        $CI->load->library('Multi_upload');
    
        $files = $CI->multi_upload->go_upload($name);
        
       if (!$files){			
            return  false;
		}else{
			return $files ;
        } 
    } 
	
	//Create Pagination
	function create_pagination($base_url, $totalRows, $uri_segment , $per_page){
		$CI = &get_instance();
		$CI->load->library('pagination');
		
		$config['base_url'] 	   = $base_url; 
		$config['total_rows']      = $totalRows; //total rows
		$config['per_page']        = $per_page; //the number of per page for pagination
		$config['uri_segment']     = $uri_segment; //see from base_url. 4 for this case
		
		$config['first_link']      = 'First';
		$config['last_link']       = 'Last';
		
		$config['full_tag_open']   = '<div class="pagination">';
		$config['full_tag_close']  = '</div>';
	
		$CI->pagination->initialize($config);
	}
	
	
	function send_email($to, $subject, $message, $header , $from){
			$CI = &get_instance();
							
			$config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.googlemail.com',
			  'smtp_port' => 465,
			  'smtp_user' => 'keyrun.gothe@gmail.com',
			  'smtp_pass' => 'fastnfurious',
			);
		
		$CI->load->library('email', $config);
		$CI->email->set_newline("\r\n");
		
		$CI->email->from($from, $header);
		$CI->email->to($to);
		
		$CI->email->subject($subject);
		$CI->email->message($message);
		
		if (!$CI->email->send())
		  show_error($CI->email->print_debugger());
		else
		  echo 'Your e-mail has been sent!';						
	}
	
	function email($to, $subject, $message, $header , $from){
			$CI = &get_instance();
			$CI->load->library('email');
					
			$CI->email->clear(true);
			
			$config['mailtype'] = 'html';
			$config['charset'] = 'UTF-8';
			$config['wordwrap'] = TRUE;
			
			$CI->email->initialize($config);
			
			$CI->email->from($from, $header);
			$CI->email->to($to);
			
			$CI->email->subject($subject);
			$CI->email->message($message);
			
			if($CI->email->send())
				return true;
			else
			//	return false;
			echo $CI->email->print_debugger();
		}
	
	//decode title (remove %20 from url titles)
	function decode_title($title){
		return urldecode(url_title($title)) ;
	}


	
	//Download Files
	function downloadFile($file){
	   $file_name = $file;
	   $mime = 'application/force-download';
	   header('Pragma: public');    
	   header('Expires: 0');        
	   header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	   header('Cache-Control: private',false);
	   header('Content-Type: '.$mime);
	   header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
	   header('Content-Transfer-Encoding: binary');
	   header('Connection: close');
	   readfile($file_name);    
		exit(); 
	}
	

