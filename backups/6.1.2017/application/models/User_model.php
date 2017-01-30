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

    private $id;
    private $branch;
    private $password;

    public function __construct(){
        parent::__construct();
    }

    /***
     * Get user by branch -> filiale
     * @param $branch_id
     * @return $user
     */
    public function get_user_by_branch_id($branch_id){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);
        $this->db->where("id",$branch_id);

        $query = $this->db->get();
        $user = $query->result();

        return $user;
    }

    /***
     * Get all branches
     * @return mixed
     */
    public function get_all_branches(){
        $this->db->select("branch,id");
        $this->db->from($this::TABLE_NAME);

        $query = $this->db->get();
        $branches = $query->result();

        return $branches;
    }


}