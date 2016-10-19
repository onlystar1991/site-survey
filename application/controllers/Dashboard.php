<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

    public function index() {
	    
	    $sites = $this->dashboard_model->get_sites($this->user->us_userid);

		$data['sites'] = $sites;
    

		$data['page'] = "dashboard";
		$data['meta_title'] = "Dashboard Newlylinks.com";
		$data['username'] = $this->session->userdata("username");
		
        $this->load->view('vwDashboard',$data);
    }
    
    public function add_site() {
	    
	    $this->form_validation->set_rules('site', 'Site', 'callback_check_valid_site');
	                
		if ($this->form_validation->run() != FALSE) {
			
			$site = $this->get_tld($_POST['site']);
			if($site == "") {
				$site = $_POST['site'];
			}
			
			$siteid = $this->general_model->add_site($this->user->us_userid);
			
			redirect("site/".$siteid);
			
			
		
		} else {
			$data['page'] = "dashboard";
			$this->load->view('vwAddsite',$data);
		}
	    
	}
	
	public function check_valid_site($str) {
		
		$site = $this->get_tld($str);
		if($site == "") {
				$site = $_POST['site'];
			}
			
		$test = preg_match("|^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$|", $site);
		if($test == 1) {
			return true; 
		} else {
			$this->form_validation->set_message('check_valid_site', $str . " is not a valid domain name. Enter in the form: \"domain.com\" - Without http:// or /path");
			return false;
		}
	}
	
	function get_tld($url){
 
		include('assets/includes/effective_tld_sublist.php');
		$urlMap = $tlds;
		$host = "";
		
		$urlData = parse_url($url);
		
		if(isset($urlData['host'])) {
			$hostData = explode('.', $urlData['host']);
			$hostData = array_reverse($hostData);
		
			if(array_search($hostData[1] . '.' . $hostData[0], $urlMap) !== FALSE) {
				$host = $hostData[2] . '.' . $hostData[1] . '.' . $hostData[0];
			} elseif(array_search($hostData[0], $urlMap) !== FALSE) {
				$host = $hostData[1] . '.' . $hostData[0];
			}
		}
		return $host;
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */