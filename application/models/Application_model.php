<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Application_model extends CI_Model
{
    public function not_get_application(){
        $sql = 'select * from contracts 
        join applications on contracts.id_application = applications.id_application
        join clients on applications.id_client = clients.id_client where contracts.status != "Исполнен"';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_application($date=false){
        if($date){
        
        $sql = 'select * from travel_list 
        join applications on travel_list.id_application = applications.id_application
        join cars on travel_list.id_car = cars.id_car 
        join drivers on travel_list.id_driver = drivers.id_driver
        where travel_list.the_factual_delivery_date = "'.$date.'"';
        
        
        }else{
            $sql = 'select * from travel_list 
        join applications on travel_list.id_application = applications.id_application
        join cars on travel_list.id_car = cars.id_car 
        join drivers on travel_list.id_driver = drivers.id_driver
        ';
        }
        
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function spisok_drivers(){
        $sql = 'select * from drivers 
        where status = "Свободен";
        ';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function spisok_cars(){
        $sql = 'select * from cars 
        where status = "Свободен";
        ';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function put_list(){
        $sql = 'select * from applications';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function insert_put_list($number_list, $id_application, $transported, $dispatch_date, $the_factual_delivery_date, $status, $id_car, $id_driver){
        $sql = 'insert into travel_list (number_list, id_application, transported, dispatch_date, the_factual_delivery_date, status, id_car, id_driver) values (?,?,?,?,?,?,?,?)';
        $result = $this->db->query($sql, [$number_list, $id_application, $transported, $dispatch_date, $the_factual_delivery_date, $status, $id_car, $id_driver]);
    }
    
}
