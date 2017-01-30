<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/14/2016
 * Time: 2:44 PM
 */
class Report_model extends CI_Model
{

    public function __construct(){
        parent::__construct();
    }

    /***
     * Get report - general report for all filiale
     * @param $year
     * @return array
     */
    public function get_report($year){

        $where = ($year != null) ? "WHERE YEAR(invitations.date_created)=$year" : "WHERE YEAR(invitations.date_created)=".date('Y');

        $sql = "SELECT firma.name, count_id,
                  sum(case when invitations.count_id = 1 then multiplier.value else 0 end) as single,
                  sum(case when invitations.count_id = 2 then multiplier.value else 0 end) as familie,
                  sum(case when invitations.count_id = 3 then multiplier.value else 0 end) as personen_3,
                  sum(case when invitations.count_id = 4 then multiplier.value else 0 end) as personen_4
                  FROM invitations
                  INNER JOIN firma ON firma.id=invitations.company
                  INNER JOIN multiplier ON multiplier.id=invitations.count_id
                  $where
                  GROUP BY firma.name";

        $query = $this->db->query($sql);
        $result = array();

        foreach ($query->result_array() as $row)
        {
            $result[] = $row;
        }

        return $result;
    }

    /***
     * Get report for specific filiale
     * @param $year
     * @param $user_id
     * @return array
     */
    public function get_filiale_report($year,$user_id){

        $where = ($year != null) ? "WHERE YEAR(invitations.date_created)=$year" : "WHERE YEAR(invitations.date_created)=".date('Y');

        $sql = "SELECT firma.name, count_id,invitations.date_created as date,invitations.consultant as consultant,
                  customer_name,
                  sum(case when invitations.count_id = 1 then multiplier.value else 0 end) as single,
                  sum(case when invitations.count_id = 2 then multiplier.value else 0 end) as familie,
                  sum(case when invitations.count_id = 3 then multiplier.value else 0 end) as personen_3,
                  sum(case when invitations.count_id = 4 then multiplier.value else 0 end) as personen_4
                  FROM invitations
                  INNER JOIN firma ON firma.id=invitations.company
                  INNER JOIN multiplier ON multiplier.id=invitations.count_id
                  $where AND invitations.user_id = $user_id
                  GROUP BY firma.name";

        $query = $this->db->query($sql);
        $result = array();

        foreach ($query->result_array() as $row)
        {
            $result[] = $row;
        }

        return $result;
    }

    /***
     * Get report for current filiale without grouping
     * @param $year
     * @param $user_id
     * @return array
     */
    public function get_filiale_report_all($year,$month,$user_id){

        $where = ($year != null && $month != null) ? "WHERE YEAR(invitations.date_created)=$year AND MONTH(invitations.date_created)=$month" : "WHERE YEAR(invitations.date_created)=".date('Y');

        $sql = "SELECT firma.name, count_id,invitations.date_created as date,invitations.consultant as consultant,
                  customer_name,
                  case when invitations.count_id = 1 then multiplier.value else 0 end as single,
                  case when invitations.count_id = 2 then multiplier.value else 0 end as familie,
                  case when invitations.count_id = 3 then multiplier.value else 0 end as personen_3,
                  case when invitations.count_id = 4 then multiplier.value else 0 end as personen_4
                  FROM invitations
                  INNER JOIN firma ON firma.id=invitations.company
                  INNER JOIN multiplier ON multiplier.id=invitations.count_id
                  $where AND invitations.user_id = $user_id";

        $query = $this->db->query($sql);
        $result = array();

        foreach ($query->result_array() as $row)
        {
            $result[] = $row;
        }

        return $result;
    }

    /**
     * Get all multipliers from database
     * @return mixed
     */
    public function get_multipliers(){
        $this->db->select("*");
        $this->db->from('multiplier');
        $query = $this->db->get();

        return $query->result();
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