<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function __construct(){
		parent::__construct();

		ini_set('display_errors', 0);

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

	public function firma()
	{
		$this->template->load("default","firmas");
	}

	/***
	 * Handle berater listing page
	 */
	public function add_berater(){
		$this->template->load("default","consultants");
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

	/****
	 * Handles Datatables editor form [needed for dashboard to load correctly] - consultants form
	 */
	public function ajax_berater(){
		//Load our library EditorLib
		$this->load->library('EditorLib');

		//`Call the process method to process the posted data
		$this->editorlib->process_consultants($_POST);
	}

	/****
	 * Handles Datatables editor form [needed for dashboard to load correctly] - consultants form
	 */
	public function ajax_firma(){
		//Load our library EditorLib
		$this->load->library('EditorLib');

		//`Call the process method to process the posted data
		$this->editorlib->process_firma($_POST);

	}

	/***
	 * List consulants options -> berater
	 */
	public function ajax_op(){
		//Load our library EditorLib
		$this->load->library('EditorLib');

		//`Call the process method to process the posted data
		$this->editorlib->process_con_opts($_POST);
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
			$this->session->set_flashdata("invitations", $invitations);

			redirect('app/be');
		}

		if($this->session->flashdata("invitations") !== FALSE)
		{
			$data['invitations'] = $this->session->flashdata("invitations");
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

	public function help(){
		$this->template->load("default","help",@$data);
	}

	public function logout(){
		$this->authenticate->logout();
	}

	public function pdf($file_name = JAHR_FILENAME){
		$this->load->library('PDFGenerator');
		$this->pdfgenerator->printPDFToBrowser($file_name);
	}

}
