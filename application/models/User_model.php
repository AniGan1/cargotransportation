<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class User_model extends CI_Model
{
    public function login($login, $password){
        $sql = 'select * from users where login = ? and password = ?';
        $result = $this->db->query($sql,[$login, $password]);
        return $result->row_array();
    }
}
