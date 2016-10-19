<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('general_model');
        $this->load->model('dashboard_model');
        $this->load->model('site_model');
        $this->load->library('form_validation');
        
    	if($this->session->userdata("username")){
        	$username = $this->session->userdata("username");
        	$email = $this->session->userdata("email");
        	$password = $this->session->userdata("password");
    	} elseif($this->input->cookie("username")){
        	$username = $this->input->cookie("username");
        	$email = $this->input->cookie("email");	        	
        	$password = $this->input->cookie("password");
        	$this->session->set_userdata(array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => md5("allerup".$this->input->post('username')),
				)
			);
    	} else {
        	redirect("/");
        	die;
    	}
    	
    	$this->user = $this->general_model->user_id();
    	if($this->user == FALSE) { redirect("/");}
    }

    public function index($siteid) {
	    
	    if($siteid == "index"){
		    redirect("dashboard");
	    }
	    $site = $this->site_model->check_site_user($this->user->us_userid, $siteid);
	    
		$data['site'] = $site;
		$data['meta_title'] = "Site overview - Newlylinks.com";
        $this->load->view('vwSite',$data);
    }
    
    function _remap($parameter){

        $this->index($parameter);
 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */