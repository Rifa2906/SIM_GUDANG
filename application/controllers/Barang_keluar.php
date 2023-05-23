<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_keluar extends CI_Controller
{


    public function index()
    {
        $data['title'] = 'Barang Keluar';
        $this->load->view('Template/header');
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Barang_keluar/index', $data);
        $this->load->view('Template/footer');
    }
}
