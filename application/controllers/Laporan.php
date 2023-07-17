<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laporan');
    }

    public function index()
    {
        $data['title'] = 'Laporan Barang Masuk';
        $data['laporan_masuk'] = $this->M_laporan->tampil_laporan_masuk();
        $this->load->view('Template/header', $data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Laporan/laporan_masuk', $data);
        $this->load->view('Template/footer');
    }

    public function laporan_keluar()
    {
        $data['title'] = 'Laporan Barang Keluar';
        
        $this->load->view('Template/header', $data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Laporan/laporan_keluar', $data);
        $this->load->view('Template/footer');
    }
}
