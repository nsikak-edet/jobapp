<?php
class Applicant_model extends CI_Model
{

    const TABLE_NAME = "applications";
    const PRIMARY_KEY = "id";

    public $id;


    public function __construct()
    {
        parent::__construct();
    }

    public function save($data)
    {
        $this->db->insert($this::TABLE_NAME, $data);
    }

    /***
     * Get all submitted applications
     * @return null
     */
    public function get_applications(){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);

        $query = $this->db->get();
        $result = $query->result();

        return (empty($result)) ? null : $result;
    }

    public function count_applications(){
        $this->db->select("count(*) as count");
        $this->db->from($this::TABLE_NAME);

        $query = $this->db->get();
        $result = $query->result();

        return (empty($result)) ? null : $result[0]->count;
    }
}