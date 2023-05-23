<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persediaan extends CI_Controller
{


    public function index()
    {
        $data['title'] = 'Persediaan';
        $this->load->view('Template/header');
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Persediaan/index', $data);
        $this->load->view('Template/footer');
    }
}
