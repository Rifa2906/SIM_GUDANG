<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyimpanan extends CI_Controller
{


    public function index()
    {
        $data['title'] = 'Penyimpanan';
        $this->load->view('Template/header');
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Penyimpanan/index', $data);
        $this->load->view('Template/footer');
    }
}
