<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Users extends CI_Model
{
    public function insertUser($data)
    {
        $sql = "INSERT INTO `users`(`login`, `password`, `fio`) VALUES (?, ?, ?)";
        $result = $this->db->query($sql, array($data['login'], $data['password'], $data['fio']));

        if ($result) {
            return $this->db->insert_id();
        }
        return false;
    }
    public function selectUser($data)
    {
        $sql = "SELECT * FROM users WHERE login = ? AND password = ? ";
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
