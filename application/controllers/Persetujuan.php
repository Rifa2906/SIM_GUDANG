<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persetujuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang');
        $this->load->model('M_persetujuan');
    }

    public function index()
    {
        $data['title'] = 'Persetujuan';
        $data['p'] = $this->M_persetujuan->tampil();
        $data['barang'] = $this->M_barang->tampil();
        $this->load->view('Template/header', $data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Persetujuan/index', $data);
        $this->load->view('Template/footer');
    }

    public function setuju()
    {
        $this->M_persetujuan->setuju();
        $status = 1;
        echo json_encode($status);
    }

    public function ditolak()
    {
        $this->M_persetujuan->ditolak();
        $status = 1;
        echo json_encode($status);
    }
}
