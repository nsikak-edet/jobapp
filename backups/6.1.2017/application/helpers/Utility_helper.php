<?php
/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/13/2016
 * Time: 3:51 PM
 */

function getAssetsURL(){
    $url = base_url() . "assets/project";
    return $url;
}

function getDataTableURL(){
    $url = base_url(). "assets/editor";
    return $url;
}

function convertToUTF8($value){
    $aUTF8 = iconv(mb_detect_encoding($value, 'UTF-8, ISO-8859-1', true), 'UTF-8', $value);
    return $aUTF8;
}

function get_multiplier_value($id,$multipliers){
    foreach($multipliers as $multiplier){
        if($multiplier->id == $id)
            return $multiplier->money_value;
    }

}

function get_login_token($data){
    $login_token = md5($data['id'].$data['password']);

    return $login_token;
}