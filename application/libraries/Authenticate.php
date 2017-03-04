<?php
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
    public function is_permitted_user(){
        $user = $this->CI->session->userdata('user');
        if($user != null){
            return true;
        }

        return false;
    }

    /***
     * @param $permitted_users
     */
    public function permit_valid_user(){
        $is_permitted = $this->is_permitted_user();
        if($is_permitted == false){
            $this->logout();
        }
    }


    /***
     * Logout user from the system
     */
    public function logout(){
        $this->CI->session->sess_destroy();
        redirect(base_url());
    }
}