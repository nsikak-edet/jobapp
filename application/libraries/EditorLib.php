<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditorLib {

    private $CI = null;
    private $editor_db = null;

    function __construct()
    {
        $this->CI = &get_instance();

        // DataTables PHP library
        require dirname(__FILE__).'/Editor-PHP-1.6.1/php/DataTables.php';

        // set datatables database
        $this->editor_db = $db;

    }

    /***
     * Process datatables editor form - Einladungen erfassen
     * @param $post
     */
    public function process($post)
    {
        //Load the model which will give us our data
        $this->CI->load->model('invite_model');

        $this->CI->load->model('invitations_model');
        $user_id = $this->CI->session->userdata('id');
        $firma = $this->CI->invitations_model->get_companies((int)$user_id);

        //Pass the database object to the model
        $this->CI->invite_model->init($this->editor_db);

        //Let the model produce the data
        $this->CI->invite_model->getInvitation($user_id);
    }


    /***
     * Process datatables editor form - Einstellungen
     * @param $post
     */
    public function process_consultants($post)
    {
        //Load the model which will give us our data
        $this->CI->load->model('consultant_model');
        $user_id = $this->CI->session->userdata('id');

        //Pass the database object to the model
        $this->CI->consultant_model->init($this->editor_db);

        //Let the model produce the data
        $this->CI->consultant_model->getConsultants($user_id);
    }

    /***
     * Process datatables editor form - Firma
     * @param $post
     */
    public function process_firma($post)
    {
        //Load the model which will give us our data
        $this->CI->load->model('firma_model');
        $user_id = $this->CI->session->userdata('id');

        //Pass the database object to the model
        $this->CI->firma_model->init($this->editor_db);

        //Let the model produce the data
        $this->CI->firma_model->getFirma($user_id);
    }



    /***
     * Process datatables editor options
     * @param $post
     */
    public function process_con_opts($post)
    {
        //Load the model which will give us our data
        $this->CI->load->model('consultant_model');

        $this->CI->load->model('invitations_model');
        $user_id = $this->CI->session->userdata('id');

        //Pass the database object to the model
        $this->CI->consultant_model->init($this->editor_db);
        //Let the model produce the data
        $this->CI->consultant_model->getConsultantsOptions($user_id);

    }
}