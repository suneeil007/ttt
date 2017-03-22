<?php defined('BASEPATH') OR exit('No direct script access allowed');  

class Client extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');
		
		$this->load->helper('cms_helper');
		$this->load->model('employer/employer_model');
		$this->load->model('jobseeker/jobseeker_model');
		
		/*if($this->ion_auth->logged_in()){
				$data['j_s'] = $this->ion_auth->user()->row() ; 
		}*/
		
		
		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->helper('language');
		
		$this->load->model('ion_auth_model');
		
	/*	$row	 							 = 	$this->ion_auth->get_user_id() ; 
		
		$data['personal_info']  		  = $this->jobseeker_model->get_PersInfo_ByUserId($row);	
		$data['count_jobs_in_basket']         = countTotal('jobseeker_job_basket', array('jobseeker_id' => $row));
		$data['count_jobs_history']           = countTotal('apply_for_job', array('apply_id' => $row));
		$data['count_blocked_org']            = countTotal('blocks_info', array('by_id'=> $row));
		$data['count_shortlisted_org']        = countTotal('short_lists_info', array('short_listed_by' => $row));
	
		
		$data['user_profile']	         = $this->employer_model->getUserId('employer_profile', 'u_id', $row);
		$data['count_shortlist_profile'] = countTotal('short_lists_info', array('short_listed_by'=>$row));
			
		$data['user_posted_job']         = $this->general_db_model->getAll_Rows('employer_post_job', 'e_id', $row);
		$data['org_type']                = $this->general_db_model->getAll('organisation_type_description');
		$data['job_cate_type']           = $this->general_db_model->getAll('functional_area_description');
		$data['list_profile']            = $this->employer_model->get_shortlist_jobseeker($row);

		$this->load->vars($data) ; 	*/
	}
	
	
	function registration(){
		load_template('front', 'auth/client/registration');	
	}

	function process($group){
		$group_row = getById('groups', 'id', $group) ;
		$this->register_member($group_row->id);
	}

	function register_member($group){
	
		$username 					= $this->input->post('username');		
		$password 					= $this->input->post('password');
		$email 						= $this->input->post('email');
		
		$addtional_data = array();
		
		$j_id =  $this->ion_auth->register($username, $password, $email, $addtional_data, array($group));
		
		if($j_id){	
				  
				if($group == 2){
		
					$js_data['user_id']  = $j_id ;
					$js_data['gender']   = $this->input->post('gender');
				    $js_data['date'] 	 = date('Y-m-d');	
						
					insert('jobseeker_pers_info', $js_data);
					
					$data['user_id']  = $j_id ; 
					insert('jobseeker_privacy_settings', $data);	
								
				  }
				  elseif($group == 6){
				  
						$e_data['user_id'] 	    = $j_id ;
						$e_data['org_name']  	= $username ;
						$e_data['org_type']  	= $this->input->post('org_type');				
				 		
						$e_id = 	insert('employer_profile', $e_data);
					
					if($e_id){
					
						$membership_data['employer_id']      = $j_id ;
						$membership_data['membership_type']  = 1 ;
					
						insert('employer_jobseeker_profile_visit_info', $membership_data);
						
						$privacy_data['user_id']      = $j_id ;
						$privacy_data['job_alert']  = 'yes' ;
					
						insert('employer_privacy_settings', $privacy_data);
					}		  
				 }				 
		}	
	}
	
	function email_check(){
		if($this->ion_auth_model->email_check($this->input->post('email')) != 1){
			echo 'true';
		}else{
			echo 'false';	
		}
	}
	
	function old_password_check(){
		if($this->ion_auth_model->hash_password_db(loggedIn_user_id() , $this->input->post('password'))){
			echo 'true';
		}else{
			echo 'false';	
		}
	}
	
	function success(){
		
		load_template('front', 'auth/client/success') ;
	}
	

	//log the user in
	function login(){
		//validate form input
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			
			$remember = (bool) $this->input->post('remember');
			
			if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());

				
				if($this->ion_auth->is_admin()){
					$this->logout();
					redirect('/','refresh');
				} 
				
				elseif($this->ion_auth->in_group('jobseeker')){			
					redirect('jobseeker', 'refresh');
				}
				elseif($this->ion_auth->in_group('employer')){
					redirect('employer', 'refresh');		
				}		

			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('/'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);
			$this->session->set_flashdata('message', $data['message']);

			redirect('/');
			exit();
		}
	}
	
	//change password 	
	function change_password(){		
		
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect(base_url(), 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			//display the form
			//set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$data['new_password'] = array(
				'name' => 'new',
				'id'   => 'new',
				'type' => 'password',
				'pattern' => '^.{'.$data['min_password_length'].'}.*$',
			);
			$data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id'   => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{'.$data['min_password_length'].'}.*$',
			);
			$data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			//render
//			$this->_render_page('auth/change_password', $data);
			if ($this->ion_auth->in_group('jobseeker'))
			{
				load_template('jobseeker', 'client/change_password', $data) ;
			}
			else {
				load_template('employer', 'client/change_password', $data) ;
			}
		}
		else
		{
			$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', 'password changed successfully');
				redirect('client/change_password', 'refresh');
				//$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('client/change_password', 'refresh');
			}
		}
	}
	
	//activate the user
	function activate($id, $code=false)	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation){
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect(base_url(), 'refresh');
		}
		else{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			
			// redirect("auth/forgot_password", 'refresh');
			
			 redirect(base_url(), 'refresh');
		}
	}
	
	//log the user out
	function logout(){		
		$logout = $this->ion_auth->logout();
		redirect(base_url(), 'refresh');
	} 	
	
	//forgot password
	function forgot_password()
	{
		$this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required');
		if ($this->form_validation->run() == false)
		{
			//setup the input
			$data['email'] = array('name' => 'email',
				'id' => 'email',
			);

			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
			}
			else
			{
				$data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			//set any errors and display the form
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
//			$this->_render_page('auth/forgot_password', $data);
			load_template('front', 'auth/client/forgot_password', $data) ;
		}
		else
		{
		    
			// get identity for that email	
			$config_tables = $this->config->item('tables', 'ion_auth');
            $identity = $this->db->where('email', $this->input->post('email'))->limit('1')->where('active =', '1')->get($config_tables['users'])->row();
			
			
			//echo $this->db->last_query();
			//die();
			//echo $this->input->post('email');
			
			if($identity){
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});
			

			if (isset($forgotten))
			{
				set_success_msg('success_message', 'Forget Password Reset success ! We just sent your account an email. Please click on the link in the email to complete the confirmation process. Please note that the confirmation email may take a few minutes to arrive and may also be in your junk/spam mail folder');
				redirect('success', 'refresh');
				
				//if there were no errors
				//$this->session->set_flashdata('message', $this->ion_auth->messages());
				//redirect(base_url().'forgot_password', 'refresh'); //we should display a confirmation page here instead of the login page
			}
			}
			else
			{
				set_success_msg('success_message', 'Forget Password unable to Reset because you are inactive user !');
//				redirect("auth/forgot_password", 'refresh');
				redirect('fail', 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			//if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				//display the form

				//set the flash data error message if there is one
				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
				'type' => 'password',
					'pattern' => '^.{'.$data['min_password_length'].'}.*$',
				);
				$data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$data['min_password_length'].'}.*$',
				);
				$data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$data['csrf'] = $this->_get_csrf_nonce();
				$data['code'] = $code;

				//render
			//$this->_render_page('auth/reset_password', $data);
			load_template('front', 'auth/client/reset_password', $data) ;
			 //load_view('auth/client/reset_password', $data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						//if the password was successfully changed
						set_success_msg('success_message', 'Password changed successfully! Please login!');
				
						//$this->logout();
						redirect('success', 'refresh');
					}
					else
					{
						set_success_msg('success_message', 'Password not changed Please try again!');
						redirect('fail/', 'refresh');
					}
				}
			}
		}
		else
		{
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('cms/reset_password_form/', 'refresh'); 
		}
	}
}