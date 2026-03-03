<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('UTC');
class Director extends CI_Controller
{
    public function index(){
		$this->load->view('temp/head');
		$this->load->view('temp/navbar');
		$this->load->view('index');
		$this->load->view('temp/footer');
	}
}
