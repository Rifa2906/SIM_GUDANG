<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
{


    public function index()
    {
        $data['title'] = 'Barang Masuk';
        $this->load->view('Template/header');
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Barang_masuk/index', $data);
        $this->load->view('Template/footer');
    }
}
