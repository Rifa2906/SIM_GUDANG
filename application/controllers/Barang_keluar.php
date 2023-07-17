<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_keluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang_keluar');
        $this->load->model('M_barang');
    }

    public function index()
    {
        $data['title'] = 'Barang Keluar';
        $data['bk'] = $this->M_barang_keluar->tampil();
        $data['barang'] = $this->M_barang->tampil();
        $this->load->view('Template/header', $data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Barang_keluar/index', $data);
        $this->load->view('Template/footer');
    }

    public function tambah()
    {
        $this->M_barang_keluar->tambah_data();
        $status = 1;
        echo json_encode($status);
    }

    public function hapus()
    {
        $this->M_barang_keluar->hapusData();
        $status = 1;
        echo json_encode($status);
    }
}
