<?php
/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/13/2016
 * Time: 3:51 PM
 */

function getAssetsURL(){
    $url = base_url() . "assets/ui";
    return $url;
}

function getDocumentURL(){
    return base_url() . "files/passports/";
}

function upload_passport($name)
{
    $ci =& get_instance();

    $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]) . "/files/";
    $config['upload_url'] = base_url() . "files/";
    $config['allowed_types'] = 'jpg';
    $config['max_size'] = 10048;
    $new_name = time().$_FILES[$name]['name'];
    $config['file_name'] = $new_name;
    $ci->load->library('upload', $config);

    if (!$ci->upload->do_upload($name)) {
        $error = array('error' => $ci->upload->display_errors());
        return  $error;
    } else {
        $data = array('upload_data' => $ci->upload->data());
        $zfile = $data['upload_data']['full_path']; // get file path
        chmod($zfile,0777); // CHMOD file


        return $data;
    }
}

/***
 * Function calculates calculates difference between all odd and even integers in a supplied array
 * @param $integers
 * @return int|null
 */
function sum_odd_even($integers){

    $odd_sum = 0;
    $even_sum = 0;
    $difference = null;

    /**
     * Iterate through all values in array to sum odd and even integers
     */
    if(!empty($integers)){
        foreach($integers as $integer){
            if (($integer % 2) == 1)
            {
                $odd_sum += $integer;
            }
            if (($integer % 2) == 0){
                $even_sum += $integer;
            }
        }

        $difference = $odd_sum - $even_sum;
    }

    return $difference;
}




