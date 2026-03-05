<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Contract_model extends CI_Model
{
    public function insert_contract($id_application, $number_contract, $conclusion_date, $due_date){
        $sql = 'insert into contracts (id_application, number_contract, conclusion_date, due_date, status) values (?,?,?,?, "В процессе")';
        $result = $this->db->query($sql,[$id_application, $number_contract, $conclusion_date, $due_date]);
        
    }

    public function select_appli(){
        $sql = 'select applications.* from applications
        left join contracts on contracts.id_application = applications.id_application
        where contracts.id_application is null
        ';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function prosmotr_appli(){
        $sql = 'select applications.*,clients.*,type_cargo.* from applications
        join clients on applications.id_client = clients.id_client
        join type_cargo on applications.type_cargo = type_cargo.type_cargo
        left join contracts on contracts.id_application = applications.id_application
        where contracts.id_application is null
        ';
        $result = $this->db->query($sql);
        return $result->result_array();
    }



}
