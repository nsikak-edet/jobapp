<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/17/2016
 * Time: 5:14 PM
 */

use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Join,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;

class Firma_model extends CI_Model
{
    private $editorDb = null;

    private $user_id;
    private $consultantID;

    private $CI;

    public function __construct(){
        parent::__construct();
        $this->CI =& get_instance();
    }

    public function init($editorDb)
    {
        $this->editorDb = $editorDb;
    }

    public function getFirma($user_id)
    {
        $this->user_id = $user_id;

        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        // Build our Editor instance and process the data coming from _POST
        Editor::inst($this->editorDb, 'firma')
            ->fields(
                Field::inst('firma.name')->getFormatter(function ($val, $data, $opts) {
                    return $this->convertToUTF8($val);
                }),

                Field::inst('firma.user_id')->setValue(intval($this->user_id)),

                Field::inst('u.branch')->getFormatter(function ($val, $data, $opts) {
                    return $this->convertToUTF8($val);
                })
            )
            ->where(function ($q) {
                $q->where('firma.user_id', $this->user_id, '=');
            })
            ->on('preRemove', function ( $editor, $id, $values) {
                $this->CI->load->model("invite_model");

                /***
                 * Check if firma has associated record
                 */
                $field_name = "company"; //firma
                $has_record = $this->CI->invite_model->has_associated_consultant($field_name,$id);
                if($has_record == true){
                    return false;
                }
            })
            ->leftJoin('users as u', 'u.id', '=', 'firma.user_id')
            ->process($_POST)
            ->json();
    }


    private function convertToUTF8($value){
        $aUTF8 = iconv(mb_detect_encoding($value, 'UTF-8, ISO-8859-1', true), 'UTF-8', $value);
        return $aUTF8;
    }


}
