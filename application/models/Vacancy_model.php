<?php
class Vacancy_model extends CI_Model
{

    const TABLE_NAME = "vacancies";
    const PRIMARY_KEY = "id";

    public $id;


    public function __construct()
    {
        parent::__construct();
    }


    /***
     * Get application limit
     * @return null
     */
    public function get_limit(){
        $this->db->select("applicants");
        $this->db->from($this::TABLE_NAME);
        $this->db->where('id',1);

        $query = $this->db->get();
        $result = $query->result();

        return (empty($result)) ? null : $result[0];
    }
}