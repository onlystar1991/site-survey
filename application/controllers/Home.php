<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('general_model');
        $this->load->library('form_validation');
    
    }

	public function index()
	{
			
			if(isset($_POST['signup'])){
				
		 		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.us_username]');
                $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'You must provide a %s.'));
                $this->form_validation->set_rules('passconf', 'Confirm Password', 'callback_check_passconf');
                $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.us_email]');

                if ($this->form_validation->run() == FALSE)
                {
	                
	                $mandrill_ready = NULL;

	                	if(validation_errors() != false) {
		                	$data["signup_error"] = true;
	                	}
	                	
	                	$data["title"] = "hej";
	                	print "hej";
                }
                else
                {	
	                
	                $signup_data = array(
						'us_username' => $this->input->post('username'),
						'us_email' => $this->input->post('email'),
						'us_password' => md5("allerup".$this->input->post('password')),

					);
					
					
					$this->general_model->add_user($signup_data);
					
					$this->session->set_userdata(array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => md5("allerup".$this->input->post('username')),
					)
				);
                    redirect("/dashboard");
                }
            } elseif(isset($_POST['signin'])){
		 		$this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                

                if ($this->form_validation->run() == FALSE)
                {
	                
	                	if(validation_errors() != false) {
		                	$data["signin_error"] = true;
	                	}
	                	
	                	$data["title"] = "hej";
                        //$this->load->view('vw_frontpage', $data);
                        print "hej";
                                        }
                else
                {	
	                
	                $email = $this->input->post('email');
	                $password = md5("allerup".$this->input->post('password'));
	                $remember = $this->input->post('remember');
	                
					$user_id = $this->general_model->log_in($email, $password);
					if($user_id == FALSE){
						$data["signin_error"] = true;
						$data["signin_error_text"] = "We didn't recognize that username or password. Try again!";
						
					} else {
						
						$username = $user_id->us_username;
						$this->session->set_userdata(array(
						'username' => $username,
						'email' => $email,
						'password' => $password,
						)
						);
						
						if($remember == "on") {
							
						$cookie = array(
					    'name'   => 'username',
					    'value'  => $username,
					    'expire' => '86500',
					    );
						$this->input->set_cookie($cookie);
						
						$cookie = array(
					    'name'   => 'email',
					    'value'  => $email,
					    'expire' => '86500',
					    );
						$this->input->set_cookie($cookie);
						
						$cookie = array(
					    'name'   => 'password',
					    'value'  => $password,
					    'expire' => '86500',
					    );
						$this->input->set_cookie($cookie);
						}
						 
						redirect("/dashboard");

						
					}
				}
            }
			
            
          /*  $email = array(
	          'html' => "Hello",
	          'text' => "hello",
	          'subject' => "Emne",
	          'email' => "per@shoplr.dk" 
            );
            
            $this->mandrill_send($email);*/

		$data["title"] = "hej";
		$this->load->view('vw_frontpage', $data);

	}
	
	public function check_passconf($passconf) {
		
		if($passconf !== $_POST['password']){
			$this->form_validation->set_message('check_passconf', 'The %s must match the password');
			return false;
			
		} else {
			return true;
		}
	}
	
	public function mandrill_send($array) {
	
	try {

	    $this->mandrill->init( $this->config->item('mandrill_api_key') );
	    $mandrill_ready = TRUE;
	
	} catch(Mandrill_Exception $e) {
	
	    $mandrill_ready = FALSE;

	
	}
	
	if( $mandrill_ready ) {

	    //Send us some email!
	    $email = array(
	        'html' => $array['html'], //Consider using a view file
	        'text' => $array['text'],
	        'subject' => $array['subject'],
	        'from_email' => 'hello@newlylinks.com',
	        'from_name' => 'Us at Newlylinks.com',
	        'to' => array(array("email" => $array['email']))
	        );
	        
	        print_r($email);
	
	    $result = $this->mandrill->messages_send($email);
	
	}
}
}
