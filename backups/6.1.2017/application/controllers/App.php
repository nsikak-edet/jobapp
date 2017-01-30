<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//protect controller from unauthorized access -> only login users can access this controller
		if($this->authenticate->is_valid_session() == false)
			$this->authenticate->logout();

		//load user model
		$this->load->model("user_model");
		$this->load->model('invitations_model');
		$this->load->model('report_model');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->template->load("default","dashboard");
	}


	/****
	 * Handles Datatables editor form [needed for dashboard to load correctly]
	 */
	public function ajax_ee(){
		//Load our library EditorLib
		$this->load->library('EditorLib');

		//`Call the process method to process the posted data
		$this->editorlib->process($_POST);
	}

	/***
	 * Handle Form request -> Bericht erstellen
	 */
	public function be(){

		$company = $this->input->post("company",TRUE);
		$month = $this->input->post("month",TRUE);
		$year = $this->input->post("year",TRUE);

		//process form on button clicked
		if($company !== null){
			$user_id = $this->session->userdata('id');
			$invitations = $this->invitations_model->search_invitations($company,$month,$year,$user_id);
			$data['invitations'] = $invitations;
		}

		$data['companies'] = $this->invitations_model->get_companies($this->session->userdata('id'));
		$data['months'] = $this->invitations_model->get_months();
		$this->template->load("default","search",$data);
	}

	/***
	 * Request for yearly report - all reports
	 */
	public function jar(){

		$year = $this->input->get('year',TRUE);
		$data['records'] = $this->report_model->get_report($year);
		$data['multipliers'] = $this->report_model->get_multipliers();
		$this->template->load("default","report",$data);
	}

	/***
	 * Request for yearly report for specific filiale
	 */
	public function jara(){
		$user_id = $this->session->userdata('id');
		$year = $this->input->get('year',TRUE);
		$month = $this->input->get('month',TRUE);
		$data['records'] = $this->report_model->get_filiale_report_all($year,$month,$user_id);
		$data['multipliers'] = $this->report_model->get_multipliers();
		$data['months'] = $this->invitations_model->get_months();
		$this->template->load("default","report_filiale_all",$data);
	}

	/***
	 * Request for yearly report for current filiale
	 */
	public function jarf(){
		$user_id = $this->session->userdata('id');
		$year = $this->input->get('year',TRUE);
		$data['records'] = $this->report_model->get_filiale_report($year,$user_id);
		$data['multipliers'] = $this->report_model->get_multipliers();
		$this->template->load("default","report_filiale",$data);
	}

	public function logout(){
		$this->authenticate->logout();
	}

}
