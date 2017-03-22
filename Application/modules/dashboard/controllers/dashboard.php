<?php
class Dashboard extends MX_Controller 
{
	function __construct()
	{
        parent::__construct();		
		
		$this->load->library('auth/ion_auth');
        
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login');
            exit();
        }	
	}

	function index(){
		$data['site_name'] = SITE_NAME ;
		
		$data['res'] = $this->ion_auth->user()->row() ;
	
        $this->template->load('admin/admin', 'dashboard', $data);
	}
	
}
