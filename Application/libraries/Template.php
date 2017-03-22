<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		public $template_data = array();
		public $CI;
		public static $data;
		//public static $tempalte;
		
		
		function __construct()
		{	
			$this->CI =& get_instance();
			log_message('debug', "Template Class Initialized");
			
			$this->current_controller();
			self::$data['sub_menu'] = FALSE;
		}
	
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
		
		 public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
   		 }

	    public function __set($property, $value) {
	        if (property_exists($this, $property)) {
	            $this->$property = $value;
	        }
	    }
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}
		
		function current_controller()
		{
			$this->CI->load->library('session');
			$this->CI->session->set_userdata('current_menu',  $this->CI->uri->segment(1));
			
			//echo $this->CI->session->userdata('current_menu');
		   
		}
		
		/*
		function load($template = '', $view = array(), $vars = array(), $return = FALSE)
		{
		$this->CI =& get_instance();
		$tpl = array();
			
		// Check for partials to load
		if (count($view) > 0)
		{
			// Load views into var array
			foreach($view as $key => $file)
			{
				$tpl[$key] = $this->CI->load->view($file, $vars, TRUE);
			}
			// Merge into vars array
			$vars = array_merge($vars, $tpl);
		}
		
		// Load master template
		return $this->CI->load->view($template, $vars, $return);
		}*/
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */