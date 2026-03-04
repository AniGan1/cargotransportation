<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Applications extends CI_Model
{
    public function insertApp($data)
    {
        $sql1 = "INSERT INTO `applications`( `number_application`, `title_cargo`, `type_cargo`, `total_weight`, `departure_point`, `destination_point`, `id_client`, `total_cost`, `distance`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $result = $this->db->query($sql2, array($data['number_application'], $$data['title_cargo'], $$data['type_cargo'], $data['departure_point'], $data['destination_point'], $data['id_client'], $data['total_cost'], $data['distance']));
        return $result;
    }
}
