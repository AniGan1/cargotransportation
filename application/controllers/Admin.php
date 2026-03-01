<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Admin extends CI_Controller
{
    public function addstudent()
    {
        $this->load->model('users');
        if (!empty($_POST)) {
            $this->load->model('students');
            $this->load->model('groupsStudents');

            $_POST['id_user'] = $this->users->insertUser($_POST);
            $_POST['id_student'] = $this->students->insert($_POST);
            $this->groupsStudents->insert($_POST);
            redirect('admin/addstudent');
        } else {
            $this->load->model('groups');
            $data['groups'] = $this->groups->selects();
            $data['students'] = $this->users->selectStudents();
            $id_role = $this->session->userdata('id_role');
            $this->load->view('temp/head');
            if (!empty($id_role) &&  $id_role == 3) {
                $this->load->view('temp/navbar_admin');
            } else {
                redirect('main/index');
            }
            $this->load->view('admin/addstudent', $data);
            $this->load->view('temp/footer');
        }
    }
    public function addteacher()
    {
        $this->load->model('users');
        $this->load->model('groupsTeachers');
        $this->load->model('groupsStudents');
        $this->load->model('teachers');
        $this->load->model('disciplines');
        if (!empty($_POST)) {
            $this->load->model('users');
            $_POST['id_user'] = $this->users->insertUser($_POST);
            $this->teachers->insert($_POST);
            redirect('admin/addteacher');
        } else {
            $this->load->model('groups');
            $data['groups'] = $this->groups->selects();
            $data['teachers'] = $this->users->selectTeachers();
            $data['disciplines'] = $this->disciplines->selects();
            $id_role = $this->session->userdata('id_role');
            $this->load->view('temp/head');
            if (!empty($id_role) &&  $id_role == 3) {
                $this->load->view('temp/navbar_admin');
            } else {
                redirect('main/index');
            }
            $this->load->view('admin/addteacher', $data);
            $this->load->view('temp/footer');
        }
    }

    public function insertdisciplinesTeachers()
    {
        $this->load->model('disciplines');
        if (!empty($_POST)) {
            $this->disciplines->insertdisciplinesTeachers($_POST);
            redirect('admin/addteacher');
        }
    }
    public function addteachergroup()
    {
        $this->load->model('groupsTeachers');
        if (!empty($_POST)) {
            $this->groupsTeachers->insert($_POST);
            redirect('admin/addteacher');
        }
    }
}
