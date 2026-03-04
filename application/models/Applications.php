<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applications extends CI_Model
{
    public function generate_number()
    {
        $year = date('Y');
        $this->db->like('number_application', "APP-$year-", 'after');
        $this->db->order_by('number_application', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('applications');
        
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $last_num = substr($row['number_application'], -3);
            $new_num = intval($last_num) + 1;
            $num = str_pad($new_num, 3, '0', STR_PAD_LEFT);
        } else {
            $num = '001';
        }
        
        return "APP-$year-$num";
    }

    public function insertApp($data)
    {
        $data['number_application'] = $this->generate_number();
        $this->db->insert('applications', $data);
        return $this->db->insert_id();
    }

    public function client_application()
    {
        $sql = "SELECT 
                applications.number_application, 
                applications.title_cargo, 
                type_cargo.title_type_cargo, 
                applications.total_weight,
                applications.departure_point, 
                applications.destination_point,
                applications.total_cost,
                applications.status
                FROM applications, type_cargo
                WHERE applications.type_cargo = type_cargo.type_cargo
                AND applications.id_client = 1
                ORDER BY applications.number_application DESC";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function calculate_cost($weight, $distance, $type_cargo)
    {
        $base_rate = 50;
        $type_coef = 1;
        
        if($type_cargo == 1) $type_coef = 1.2;
        else if($type_cargo == 2) $type_coef = 1;
        else if($type_cargo == 3) $type_coef = 1.5;
        else if($type_cargo == 4) $type_coef = 1.1;
        else if($type_cargo == 5) $type_coef = 1.3;
        
        return $weight * $distance * $base_rate * $type_coef;
    }
}