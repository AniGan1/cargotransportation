<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Teacher extends CI_Controller
{

    public function person_cabinet()
    {
        $id_role = $this->session->userdata('id_role');

        $id_user = $this->session->userdata('id_user');

        $this->load->model('teachers');

        $data['teacher'] = $this->teachers->select($id_user);

        $this->load->view('temp/head');
        $this->load->view('temp/navbar_teacher');
        $this->load->view('teacher/person_cabinet', $data);
        $this->load->view('temp/footer');
    }

    public function assessments()
    {
        $this->load->model('teachers');
        $this->load->model('students');
        $this->load->model('grades');
        $this->load->model('disciplines');

        $id_user = $this->session->userdata('id_user');
        $id_teacher = $this->teachers->select($id_user)[0]['id_teacher'];

        if (!empty($_POST)) {
            $_POST['date'] = date('Y-m-d');
            $_POST['id_teacher'] = $id_teacher;
            $this->grades->insert($_POST);
            redirect('teacher/assessments');
        } else {
            $data['grades'] = $this->grades->selectsTeacher($id_teacher);
            $data['students'] = $this->students->selectsTeacher($id_teacher);
            $data['disciplines'] = $this->disciplines->selectDiscipline($id_teacher);

            $this->load->view('temp/head');
            $this->load->view('temp/navbar_teacher');
            $this->load->view('teacher/grades', $data);
            $this->load->view('temp/footer');
        }
    }
    public function student()
    {
        $id_student = $this->uri->segment(3);
        $this->load->model('grades');
        $data['grades'] = $this->grades->select($id_student);

        $this->load->view('temp/head');
        $this->load->view('temp/navbar_teacher');
        $this->load->view('teacher/student', $data);
        $this->load->view('temp/footer');
    }
    public function group()
    {
        $this->load->model('teachers');
        $id_StudentGroup = $this->uri->segment(3);
        $id_user = $this->session->userdata('id_user');
        $id_teacher = $this->teachers->select($id_user)[0]['id_teacher'];
        $this->load->model('grades');
        $data['grades'] = $this->grades->selectGroup($id_teacher, $id_StudentGroup);

        $this->load->view('temp/head');
        $this->load->view('temp/navbar_teacher');
        $this->load->view('teacher/group', $data);
        $this->load->view('temp/footer');
    }

    public function editgrade()
    {
        if (!empty($_POST)) {
            $this->load->model('grades');
            $this->grades->update($_POST);
            redirect('teacher/assessments');
        }

        $data['id_grade'] = $this->uri->segment(3);
        $this->load->view('temp/head');
        $this->load->view('temp/navbar_teacher');
        $this->load->view('teacher/editgrade', $data);
        $this->load->view('temp/footer');
    }
    public function removegrade()
    {
        $id_grade = $this->uri->segment(3);
        $this->load->model('grades');
        $this->grades->remove($id_grade);
        redirect('teacher/assessments');
    }
}
