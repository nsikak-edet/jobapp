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

class Invite_model extends CI_Model
{

    const TABLE_NAME = "invitations";

    private $editorDb = null;

    private $firma;
    private $user_id;
    private $consultantID;

    public function init($editorDb)
    {
        $this->editorDb = $editorDb;
    }

    /***
     * Get invitations for this filiale
     * @param $user_id
     */
    public function getInvitation($user_id)
    {
        $this->user_id = $user_id;

        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        // Build our Editor instance and process the data coming from _POST
        Editor::inst($this->editorDb, 'invitations')
            ->fields(
                Field::inst('invitations.company')
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

                Field::inst('firma.name')->getFormatter(function ($val, $data, $opts) {
                    return $this->convertToUTF8($val);
                }),

                Field::inst('invitations.consultant')
                    ->options(DataTables\Editor\Options::inst()
                        ->table('consultants')
                        ->value('id')
                        ->label('name')
                        ->where(function ($q) {
                            $q->where('user_id', $this->user_id, '=');
                        })->render(function ($row) {
                            return $this->convertToUTF8($row['name']);
                        })
                    ),

                Field::inst('c.name')
                    ->getFormatter(function ($val, $data, $opts) {
                        return $this->convertToUTF8($val);
                    }),

                Field::inst('invitations.customer_name')->validator('Validate::notEmpty')
                    ->getFormatter(function ($val, $data, $opts) {
                        return $this->convertToUTF8($val);
                    }),

                Field::inst('multiplier.value'),

                Field::inst('multiplier.name')
                    ->getFormatter(function ($val, $data, $opts) {
                        return $this->convertToUTF8($val);
                    }),

                Field::inst('invitations.count_id')
                    ->options(DataTables\Editor\Options::inst()
                        ->table('multiplier')
                        ->value('id')
                        ->order('money_value desc')
                        ->label('name')->render(function ($row) {
                            return $this->convertToUTF8($row['name']);
                        })
                    ),

                Field::inst('invitations.user_id')->setValue($this->user_id)->getFormatter(function ($val, $data, $opts) {
                    return $this->convertToUTF8($val);
                }),

                Field::inst('invitations.date_created')->setFormatter(function ($val, $data, $opts) {
                    if($val == ''){
                        return date('Y-m-d H:i:s');
                    }

                    return date('Y-m-d H:i:s',strtotime($val));
                })
                  ->getFormatter(function ($val, $data, $opts) {
                      return date('d.m.Y', strtotime($val));
                    }),

                Field::inst('u.branch')->getFormatter(function ($val, $data, $opts) {
                    return $this->convertToUTF8($val);
                })
            )
            ->where(function ($q) {
                $q->where('invitations.user_id', $this->user_id, '=');
            })
            ->leftJoin('firma', 'firma.id', '=', 'invitations.company')
            ->leftJoin('users as u', 'u.id', '=', 'invitations.user_id')
            ->leftJoin('consultants as c', 'c.id', '=', 'invitations.consultant')
            ->leftJoin('multiplier', 'multiplier.id', '=', 'invitations.count_id')
            ->process($_POST)
            ->json();
    }

    private function convertToUTF8($value){
        $aUTF8 = iconv(mb_detect_encoding($value, 'UTF-8, ISO-8859-1', true), 'UTF-8', $value);
        return $aUTF8;
    }

    /**
     * Check consultant id has data in invitation
     * @param $field
     * @param $id
     * @return bool
     */
    public function has_associated_consultant($field='consultant',$consultant_id){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);
        $this->db->where($field,$consultant_id);

        $query = $this->db->get();
        $consultant = $query->result();


        if(empty($consultant)){
            return false;
        }
        else{
            return true;
        }


    }
}
