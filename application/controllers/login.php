<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Handle admin login for administral operations
class Login extends CI_Controller {
	public function index(){
		// If user already have admin, redirect to admin panel
		if (isset($_SESSION['admin'])) {
			header('location: ' .base_url() . 'admin');
		}
		
		// Avoid empty data warning
		$data[''] = "";
		
		// Retrieve user data from configuration
		$this->load->config('user');
		$conf_username = $this->config->item('username');
		$conf_password = $this->config->item('password');
		
		// Make sure both fields have valid values
		if ($conf_username == "" or $conf_password == ""){
            		$data['fail'] = "Invalid user configuration";
        	} else {
			if (isset($_POST['username'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				
				// Check input towards configuration
				if ($username == $conf_username && $password == $conf_password) {
					$_SESSION['admin'] = true;
					$_SESSION['user'] = htmlentities(mysql_real_escape_string(stripslashes($_POST['username'])));
					header('location: '.base_url().'admin');
				}
				
				$data['fail'] = "Incorrect user data ";
				
        		}		
        	}
		
		// Load template
		$this->load->view('login-template', $data);
	}

}
