<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once 'Ion_auth.php';

class User_auth
{

        public $auth;
		public static $ci;

        public function __construct()
        {
			self::$ci =& get_instance();
				//User_auth::$auth = new Ion_auth();
			self::$ci->lang->load('auth/ion_auth');
			self::$ci->load->library('auth/ion_auth');
            self::$ci->load->model('auth/ion_auth_model');
			
            //$this->load->helper('recaptcha');
				
                
             $this->ion_auth = self::$ci->ion_auth;
			 
            if (self::$ci->ion_auth->logged_in() && get_cookie('identity') && get_cookie('remember_code'))
            {
                   // self::$ci->seeker_auth = $this;
                   self::$ci->ion_auth_model->login_remembered_user();
            }
        }
		
		public function logged_in(){
			//self::$ci->load->model('')
			return self::$ci->ion_auth->logged_in();	
		}
		
		public function test(){
			return self::$ci->ion_auth->logged_in();
		}
		
		public function register_new($username, $password, $email, $additional_data, $extra_info = FALSE){
			
			//debug($extra_info);
			
			if($id = self::$ci->ion_auth->register($username, $password, $email,$additional_data,$group_id = array(2), $extra_info)){
				$return_data['stat'] 	=  TRUE;
				$return_data['data'] 	=  $id;
				$return_data['msg'] 	=  self::$ci->ion_auth->messages();
			}else{
				$return_data['stat'] 	=  FALSE;
				$return_data['error'] 	=  self::$ci->ion_auth->errors();
				  
			}
			
			return (object)$return_data;
		}
		
		public function user_type($id = FALSE){
			if(!$id){
				$id = self::$ci->session->userdata('user_id');
			}
			$res = self::$ci->db->select('account_type')
								->where('ion_user_id', $id)
								->get('tbl_members')
								->row();
			return $res->account_type;
		}
		
		public function change_password($email, $password){
			return self::$ci->ion_auth_model->ion_auth_model->direct_password_changing($email, $password);
		}
		
		public function check_username($username){
			return self::$ci->ion_auth_model->ion_auth_model->username_check($username);
		}
		
		public function get_user_details($id){
			return self::$ci->ion_auth_model->ion_auth_model->get_user_details($id);
		}
		
		public function change_email_address($email, $old_email){
			$res = self::$ci->ion_auth_model->ion_auth_model->email_check($email);
			if(!$res){
				$id  = self::$ci->ion_auth_model->ion_auth_model->get_user_details_by_email($old_email)->id;
				$data['email'] = $email;
				return self::$ci->db->where('id', $id)->update('users',$data);
				
			}else{
				return FALSE;
			}
		}
}