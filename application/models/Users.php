<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Users extends CI_Model
{
    public function insertUser($login, $password, $fio, $phone, $email, $address, $bank_details)
    {
    $sql1 = "INSERT INTO users (login, password) VALUES(?,?)";
    $this->db->query($sql1, array($login, $password));
      $user_id = $this->db->insert_id();
       $sql2 = "INSERT INTO clients (fio, phone, email, address, id_user, bank_details) VALUES (?, ?, ?, ?, ?, ?)";
    $result = $this->db->query($sql2, array($fio, $phone, $email, $address, $user_id, $bank_details));  
    return $result;
    }
    public function selectUser($data)
    {
        $sql = "SELECT * FROM users WHERE login = ? AND password = ?;
                ";
        $result = $this->db->query($sql, array($data['login'], $data['password']));
        return $result->row_array();
    }

}
