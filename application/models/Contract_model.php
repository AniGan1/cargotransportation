<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Contract_model extends CI_Model
{
    public function insert_contract($id_application, $number_contract, $conclusion_date, $due_date){
        $sql = 'insert into contracts (id_application, number_contract, conclusion_date, due_date, status) values (?,?,?,?, "В процессе")';
        $result = $this->db->query($sql,[$id_application, $number_contract, $conclusion_date, $due_date]);
        
    }
}
