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
    public function selectTeachers()
    {
        $sql = "SELECT 
    users.id_user,
    users.fio, 
    COALESCE(GROUP_CONCAT(DISTINCT disciplines.title_discipline ORDER BY disciplines.title_discipline SEPARATOR ', '), 'Нет дисциплин') AS disciplines,
    teachers.id_teacher, 
    teachers.academic_degree, 
    teachers.department, 
    COALESCE(GROUP_CONCAT(DISTINCT groups.title_group ORDER BY groups.title_group SEPARATOR ', '), 'Нет групп') AS groups 
FROM users 
JOIN teachers ON users.id_user = teachers.id_user 
LEFT JOIN groupsTeachers ON teachers.id_teacher = groupsTeachers.id_teacher 
LEFT JOIN groups ON groupsTeachers.id_group = groups.id_StudentGroup 
LEFT JOIN disciplinesTeachers dt ON dt.id_teacher = teachers.id_teacher 
LEFT JOIN disciplines ON dt.id_discipline = disciplines.id_disciplines 
GROUP BY users.id_user, users.fio, teachers.id_teacher, teachers.department;";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function selectStudents()
    {
        $sql = "SELECT * FROM users , students WHERE users.id_user = students.id_user ";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
