<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/14/2016
 * Time: 2:44 PM
 */
class Invitations_model extends CI_Model
{

    const TABLE_NAME = "invitations";
    const PRIMARY_KEY = "id";

    private $id;
    private $company; //firma
    private $consultant; //berater
    private $customer_name; //kundenname
    private $count_id;
    private $user_id;
    private $date_created;

    public function __construct(){
        parent::__construct();
    }

    /**
     * Save data into database
     * @param $data
     */
    public function save($data){
        $this->db->insert($this::TABLE_NAME,$data);
    }

    /***
     * Get all companies
     * @return mixed
     */
    public function get_companies($user_id){
        $this->db->select("*");
        $this->db->from("firma");
        $this->db->where("user_id",$user_id);
        
        $query = $this->db->get();

        return $query->result();
    }

    /***
     * Get all multipliers
     * @return mixed
     */
    public function get_multipliers(){
        $this->db->select("*");
        $this->db->from("multiplier");
        $query = $this->db->get();

        return $query->result();
    }

    public function get_months(){
        $this->db->select("*");
        $this->db->from("month");
        $query = $this->db->get();
        return $query->result();
    }

    public function search_invitations($company,$month='',$year='',$user_id)
    {
        $result = array();
        if($year != '' && $month != ''){

            $sql = "SELECT *,firma.name as company, count_id,
                      case when invitations.count_id = 1 then multiplier.value else 0 end as single,
                      case when invitations.count_id = 2 then multiplier.value else 0 end as familie,
                      case when invitations.count_id = 3 then multiplier.value else 0 end as personen_3,
                      case when invitations.count_id = 4 then multiplier.value else 0 end as personen_4
                      FROM invitations
                      INNER JOIN firma ON firma.id=invitations.company
                      INNER JOIN multiplier ON multiplier.id=invitations.count_id
                      WHERE invitations.company=$company AND invitations.user_id=$user_id AND MONTH(date_created) = $month
                      AND YEAR(date_created) = $year";

            $query = $this->db->query($sql);
            $result = array();

            foreach ($query->result_array() as $row)
            {
                $result[] = $row;
            }

        }

        return $result;
    }
}