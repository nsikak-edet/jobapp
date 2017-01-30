<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Template class
 */
class Template
{
    var $ci;

    function __construct()
    {
        $this->ci =& get_instance();

    }

    /**
     * Method loads basic template for view
     * Data expected must contain these important elements => 'page_title','content_heading' in an associative array
     * Note: $data array may contain other values as well
     *
     * @param string $tpl_view -> the template to be loaded
     * @param string $body_view -> the body content to be loaded
     * @param array $data -> array containing all data passed to the view
     * @param string $script -> concatenated list of page level scripts
     * @return null
     */
    function load($tpl_view, $body_view = null, $data = null)
    {

        //find if the template file is valid and file is found!
        //Only find template when body view is set
        $body = '';

        if ($body_view != null) {
            if (file_exists(APPPATH . 'views/body/' . $tpl_view . '/' . $body_view)) {
                $body_view_path = $tpl_view . '/' . $body_view;
            } else if (file_exists(APPPATH . 'views/body/' . $tpl_view . '/' . $body_view . '.php')) {
                $body_view_path = $tpl_view . '/' . $body_view . '.php';
            } else if (file_exists(APPPATH . 'views/body/' . $body_view)) {
                $body_view_path = $body_view;
            } else if (file_exists(APPPATH . 'views/body/' . $body_view . '.php')) {
                $body_view_path = 'body/' . $body_view . '.php';
            } else {
                show_error('Unable to load the requested file: ' . $tpl_view . '/' . $body_view . '.php');
            }

            //load body template
            $body = $this->ci->load->view($body_view_path, $data, TRUE);
        }

        if (is_null($data)) {
            $data = array('body' => $body);
        } else if (is_array($data)) {
            $data['body'] = $body;
        } else if (is_object($data)) {
            $data->body = $body;
        }

        $this->ci->load->view('templates/' . $tpl_view, $data);
    }

    public function addData($key,$value){
        $this->data[$key] = $value;

    }

}
