<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function index() {
		
		session_destroy();
		delete_cookie("username");
		delete_cookie("password");
		delete_cookie("email");
	    redirect("/");
		
	}	
}