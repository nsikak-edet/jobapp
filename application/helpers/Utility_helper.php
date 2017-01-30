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


//function hex2dec
//returns an associative array (keys: R,G,B) from a hex html code (e.g. #3FE5AA)
function hex2dec($couleur = "#000000"){
    $R = substr($couleur, 1, 2);
    $rouge = hexdec($R);
    $V = substr($couleur, 3, 2);
    $vert = hexdec($V);
    $B = substr($couleur, 5, 2);
    $bleu = hexdec($B);
    $tbl_couleur = array();
    $tbl_couleur['R']=$rouge;
    $tbl_couleur['G']=$vert;
    $tbl_couleur['B']=$bleu;
    return $tbl_couleur;
}

//conversion pixel -> millimeter in 72 dpi
function px2mm($px){
    return $px*25.4/72;
}

function txtentities($html){
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}
////////////////////////////////////