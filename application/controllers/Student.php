<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Student extends CI_Controller
{

    public function person_cabinet()
    {
        $id_user = $this->session->userdata('id_user');

        $this->load->model('groupsStudents');
        $this->load->model('students');
        $id_student = $this->students->select($id_user)['id_student'];
        $data['group'] = $this->groupsStudents->select($id_student);

        $this->load->view('temp/head');
        $this->load->view('temp/navbar_student');
        $this->load->view('student/person_cabinet', $data);
        $this->load->view('temp/footer');
    }
    public function grades()
    {
        $id_role = $this->session->userdata('id_role');
        $id_user  = $this->session->userdata('id_user');
        $this->load->model('students');
        $this->load->model('grades');
        $id_student = $this->students->select($id_user)['id_student'];
        $data['grades'] = $this->grades->select($id_student);
        
        $this->load->view('temp/head');
        $this->load->view('temp/navbar_student');
        $this->load->view('student/grades', $data);
        $this->load->view('temp/footer');
    }
}
