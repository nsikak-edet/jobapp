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
    private $editorDb = null;

    private $firma;
    private $user_id;

    public function init($editorDb)
    {
        $this->editorDb = $editorDb;
    }

    public function getStaff($firma,$user_id)
    {
        $this->firma = $firma;
        $this->user_id = $user_id;

        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        // Build our Editor instance and process the data coming from _POST
        Editor::inst($this->editorDb, 'invitations')
            ->fields(
                Field::inst( 'invitations.company')
                    ->options( DataTables\Editor\Options::inst()
                        ->table('firma')
                        ->value('id')
                        ->label('name' )
                        ->where(function ($q) {
                            $q->where( 'user_id', $this->user_id, '=' );
                        })->render(function ($row) {
                            return $this->convertToUTF8($row['name']);
                        })
                    ),

                Field::inst( 'firma.name')->getFormatter(function ($val, $data, $opts ) {
                    return $this->convertToUTF8($val);
                }),

                Field::inst( 'invitations.consultant' )->validator( 'Validate::notEmpty' )
                    ->getFormatter(function ($val, $data, $opts ) {
                        return $this->convertToUTF8($val);
                    }),

                Field::inst( 'invitations.customer_name' )->validator( 'Validate::notEmpty' )
                    ->getFormatter(function ($val, $data, $opts ) {
                        return $this->convertToUTF8($val);
                    }),

                Field::inst('multiplier.value'),

                Field::inst( 'multiplier.name')
                    ->getFormatter(function ($val, $data, $opts ) {
                        return $this->convertToUTF8($val);
                    }),

                Field::inst( 'invitations.count_id')
                    ->options( DataTables\Editor\Options::inst()
                        ->table('multiplier')
                        ->value('id')
                        ->label('name' )->render(function ($row) {
                            return $this->convertToUTF8($row['name']);
                        })
                    ),

                Field::inst( 'invitations.user_id')->setValue($this->user_id)->getFormatter(function ($val, $data, $opts ) {
                    return $this->convertToUTF8($val);
                }),

                Field::inst('invitations.date_created')->setValue(date('Y-m-d H:i:s'))
                    ->getFormatter( function ( $val, $data, $opts ) {
                        return date( 'd.m.Y', strtotime( $val ) );
                    }),
                Field::inst( 'u.branch')->getFormatter(function ($val, $data, $opts ) {
                    return $this->convertToUTF8($val);
                })
            )
            ->where(function ($q) {
                $q->where( 'invitations.user_id', $this->user_id, '=' );
            })
            ->leftJoin('firma','firma.id','=','invitations.company')
            ->leftJoin('users as u','u.id','=','invitations.user_id')
            ->leftJoin('multiplier','multiplier.id','=','invitations.count_id')
            ->process($_POST)
            ->json();
    }

    private function convertToUTF8($value){
        $aUTF8 = iconv(mb_detect_encoding($value, 'UTF-8, ISO-8859-1', true), 'UTF-8', $value);
        return $aUTF8;
    }



}
