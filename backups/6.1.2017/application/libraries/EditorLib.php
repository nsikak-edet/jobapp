<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditorLib {

    private $CI = null;

    function __construct()
    {
        $this->CI = &get_instance();
    }

    public function process($post)
    {
        // DataTables PHP library
        require dirname(__FILE__).'/Editor-PHP-1.6.1/php/DataTables.php';

        $app_path = dirname(__FILE__).'/Editor-PHP-1.6.1/php/DataTables.php';


        //Load the model which will give us our data
        $this->CI->load->model('invite_model');

        $this->CI->load->model('invitations_model');
        $user_id = $this->CI->session->userdata('id');
        $firma = $this->CI->invitations_model->get_companies((int)$user_id);

        //Pass the database object to the model
        $this->CI->invite_model->init($db);

        //Let the model produce the data
        $this->CI->invite_model->getStaff($firma,$user_id);
    }
}