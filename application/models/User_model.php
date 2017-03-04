<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/14/2016
 * Time: 2:44 PM
 */
class User_model extends CI_Model
{

    const TABLE_NAME = "users";
    const PRIMARY_KEY = "id";



    public function __construct(){
        parent::__construct();
    }


    public function save($data){
        $this->db->insert($this::TABLE_NAME,$data);
    }

    public function update($user_id,$data){
        $this->db->where('id',$user_id);
        $this->db->update($this::TABLE_NAME,$data);
    }

    public function get_user_by_username($username){
        $this->db->select('*');
        $this->db->from($this::TABLE_NAME);
        $this->db->where('username',$username);

        $query = $this->db->get();
        $result = $query->result();

        return (empty($result)) ? null  : $result[0];
    }

}