<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/14/2016
 * Time: 4:27 PM
 */
class Authenticate
{
    private $CI;

    public function __construct(){
        $this->CI =& get_instance();
    }


    /***
     * Check if session is valid
     * @return bool
     */
    public function is_valid_session(){
        $session_token = $this->CI->session->userdata('token');
        if($session_token != null){

            $sess_user_id = $this->CI->session->userdata('id');
            $sess_user_pass = $this->CI->session->userdata('password');

            $token_data = array('id'=>$sess_user_id,'password'=>$sess_user_pass);

            if($sess_user_id != null && $sess_user_pass != null){
                    $thistoken = get_login_token($token_data);

                    if($thistoken == $session_token)
                        return true;
            }

        }

        return false;
    }


    /***
     * Logout user from the system
     */
    public function logout(){
        $this->CI->session->sess_destroy();
        redirect(base_url());
    }
}