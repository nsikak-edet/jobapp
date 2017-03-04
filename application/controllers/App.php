<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Register new applicaiton - request handler
     */
    public function index()
    {
        $data['page_title'] = "Applicant Registration Form";
        $application_form = $this->input->post('application_form',TRUE);

        /***
         * If number of submitted applications is = 4, alert application closed
         */
        $this->load->model('vacancy_model');
        $this->load->model('applicant_model');
        $submitted_applications = $this->applicant_model->count_applications();
        $vacancy_limit = $this->vacancy_model->get_limit();
        if($vacancy_limit->applicants == $submitted_applications){
            $this->template->load("default", 'limit', $data);
            return;
        }

        //process new application form on submit
        if($application_form != null){

            //validate form data
            $this->load->library("form_validation");
            $this->form_validation->set_rules('first_name','First Name','trim|required');
            $this->form_validation->set_rules('surname','Surname','trim|required');
            $this->form_validation->set_rules('phone_number','Phone Number','trim|required|numeric');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $passport = upload_passport('passport');

            //submit form data into database on successful validation
            if($this->form_validation->run() == true && isset($passport['upload_data']))
            {
                $new_applicant = array(
                    'first_name' => $this->input->post('first_name',TRUE),
                    'surname' => $this->input->post('surname',TRUE),
                    'phone_number' => $this->input->post('phone_number',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'passport' => $passport['upload_data']['file_name'],
                    'date_created' => date('Y-m-d H:i:s')
                );

                //load applicant model
                $this->load->model('applicant_model');
                $this->applicant_model->save($new_applicant);


                //alert user of a successful form submission
                $this->session->set_flashdata('success',1);
                redirect(base_url());
            }

        }

        $body = "applicant_form";

        //load success page
        if($this->session->flashdata('success')){
            $body = 'success';
        }

        //passport error
        $data['passport_error'] = @$passport['error'];
        $this->template->load("default", $body, $data);
    }

    public function applicants(){
        //secure method from unauthorize execution
        $this->authenticate->permit_valid_user();
        $this->load->model('applicant_model');

        $data['page_title'] = "Applicants";
        $applications = $this->applicant_model->get_applications();
        $data['applicants'] = $applications;

        $this->template->load("default", 'applicants', $data);
    }

    public function odd_even(){
        $integers = array(1,2,3,4,5);
        $difference = sum_odd_even($integers);
//        echo $difference;
    }

}
