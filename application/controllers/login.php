<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){

		if(isset($_SESSION['admin'])) {
			header('location: ' .base_url() . 'admin');
		}

		$this->load->config('user');
		$conf_username = $this->config->item('username');
		$conf_password = $this->config->item('password');
		if($conf_username == "" or $conf_password == ""){
            $data['fail'] = "You may not login until password and/or username has been set";
        }else{

		$data[''] = "";
		if(isset($_POST['username'])) {

			$username = $_POST['username'];
			$password = $_POST['password'];

			if( $username == $conf_username && $password = $conf_password){
				$_SESSION['admin'] = true;
				$_SESSION['user'] = htmlentities(mysql_real_escape_string(stripslashes($_POST['username'])));
				header('location: ' . base_url() . 'admin');

			}else {
				$data['fail'] = "password and/or username incorrect";
			}

        }

        }

		$this->load->view('login-template', $data);
	}

}
