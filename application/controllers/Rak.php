<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rak extends CI_Controller
{


    public function index()
    {
        $data['title'] = 'Rak';
        $this->load->view('Template/header');
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Rak/index', $data);
        $this->load->view('Template/footer');
    }
}
