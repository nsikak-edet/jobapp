<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//Redirect login user to dashboard [do this for users that has logged in already]
		if($this->authenticate->is_valid_session() == true)
			redirect(base_url()."index.php/app/");

		//load user model
		$this->load->model("user_model");
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$login = $this->input->post('login');

		//process login form
		if(strtolower($login) != null){
			$branch_id = (int)$this->input->post('branch_id');
			$password = $this->input->post("password");
			$user = $this->user_model->get_user_by_branch_id($branch_id);

			//create login session if login is successful
			if($this->login($user,$password)){

				//generate login token
				$token_data = array('id'=>$user[0]->id,'password'=>$user[0]->password);
				$login_token = get_login_token($token_data);

				$session_data = array('branch'=>$user[0]->branch,'id'=>$user[0]->id,'password'=>$user[0]->password,'token'=>$login_token);
				$this->session->set_userdata($session_data);

				//redirect user to dashboard
				redirect(base_url()."index.php/app/");

			}else{
				$data['login_error_msg'] = "ungültige Login Daten!";
			}
		}

		//get all branches
		$data['branches'] = $this->user_model->get_all_branches();
		$this->template->load("login_default","login",$data);
	}

	/***
	 * @param $user
	 * @param $password
	 * Login user using branch and password
	 */
	private function login($user,$password){

		//return false if user not found
		if(empty($user))
			return false;
		else{

			//check if password matches, else return false for invalid password
			$password = md5($password);
			if($password === $user[0]->password){
				return true;
			}else{
				return false;
			}
		}
	}

}
