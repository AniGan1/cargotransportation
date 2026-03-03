<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Client extends CI_Controller
{
    public function cabinet(){
        $this->load->view('temp/head');
        $this->load->view('client/navbar');
        $this->load->view('client/cabinet');
        $this->load->view('temp/footer');

    }
}