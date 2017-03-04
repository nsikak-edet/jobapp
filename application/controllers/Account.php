<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Login request handler
	 */
	public function index()
	{
		//load user model
		$this->load->model('user_model');

		if($this->session->userdata('user')){
			redirect("app/");
		}

		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);

		$this->load->library("form_validation");
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->load->library('bcrypt');

		if($this->form_validation->run() == TRUE){
			$user = $this->user_model->get_user_by_username($username);

			//notify error on invalid username -> email address
			if(empty($user)){
				//echo error to user
				$data['invalid_details'] = "Invalid username or password";
			}else{
				/***
				 * Check user's password
				 */

				//load password hash library
				$this->load->library('bcrypt');
				$user_hash_pass = $user->password;
				$valid_password = $this->bcrypt->verify($password,$user_hash_pass);

				//Login validated user and user is active
				if($valid_password == true){
					$session_data = array(
						'user' => $user
					);

					//set session data for user
					$this->session->set_userdata($session_data);

					//redirect to dashboard
					redirect("app");

				}else{
					//echo invalid password error to user
					$data['invalid_details'] = "Invalid username or password";
				}
			}

		}

		$this->template->load("login_default", null, @$data);
	}

	/**
	 * Logout request handler
	 */
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
