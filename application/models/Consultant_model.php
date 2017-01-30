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

class Consultant_model extends CI_Model
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

    public function getConsultants($user_id)
    {
        $this->user_id = $user_id;

        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        // Build our Editor instance and process the data coming from _POST
        Editor::inst($this->editorDb, 'consultants')
            ->fields(
                Field::inst('consultants.company')
                    ->options(DataTables\Editor\Options::inst()
                        ->table('firma')
                        ->value('id')
                        ->label('name')
                        ->order('name asc')
                        ->where(function ($q) {
                            $q->where('user_id', $this->user_id, '=');
                        })->render(function ($row) {
                            return $this->convertToUTF8($row['name']);
                        })
                    ),

                Field::inst('consultants.date_created')->setValue(date('Y-m-d H:i:s'))
                    ->getFormatter(function ($val, $data, $opts) {
                        return date('d.m.Y', strtotime($val));
                    }),

                Field::inst('firma.name')->getFormatter(function ($val, $data, $opts) {
                    return $this->convertToUTF8($val);
                }),

                Field::inst('consultants.name')->getFormatter(function ($val, $data, $opts) {
                        return $this->convertToUTF8($val);
                    }),


                Field::inst('consultants.user_id')->setValue($this->user_id)->getFormatter(function ($val, $data, $opts) {
                    return $this->convertToUTF8($val);
                }),

                Field::inst('u.branch')->getFormatter(function ($val, $data, $opts) {
                    return $this->convertToUTF8($val);
                })

            )
            ->where(function ($q) {
                $q->where('consultants.user_id', $this->user_id, '=');
            })
            ->on('preRemove', function ( $editor, $id, $values) {
                $this->CI->load->model("invite_model");

                /***
                 * Check if record has associated data
                 */
                $has_record = $this->CI->invite_model->has_associated_consultant($id);
                if($has_record == true){
                    return false;
                }
            })
            ->leftJoin('firma', 'firma.id', '=', 'consultants.company')
            ->leftJoin('users as u', 'u.id', '=', 'consultants.user_id')
            ->process($_POST)
            ->json();
    }




    /**
     * Get list of berater-> associated with this firma and filiale
     * @param $user_id
     */
    public function getConsultantsOptions($user_id){

        $consultantID = $_GET["consultantID"];
        $this->user_id = $user_id;
        $this->consultantID = $consultantID;

        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        // Build our Editor instance and process the data coming from _POST
        Editor::inst($this->editorDb, 'consultants')
            ->fields(
                Field::inst('name')
                    ->options(DataTables\Editor\Options::inst()
                        ->table('consultants')
                        ->value('id')
                        ->label('name')
                        ->order('name asc')
                        ->where(function ($q) {
                            $q->where('user_id', $this->user_id, '=')
                            ->where('company',$this->consultantID,'=');
                        })->render(function ($row) {
                            return $this->convertToUTF8($row['name']);
                        })
                    )
            )->where('user_id', $this->user_id, '=')
            ->process($_POST)
            ->json();

    }

    private function convertToUTF8($value){
        $aUTF8 = iconv(mb_detect_encoding($value, 'UTF-8, ISO-8859-1', true), 'UTF-8', $value);
        return $aUTF8;
    }


}
