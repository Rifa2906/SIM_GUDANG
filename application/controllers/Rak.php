<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_rak');
    }


    public function index()
    {
        $data['title'] = 'Rak';
        $data['rak'] = $this->M_rak->tampil();
        $this->load->view('Template/header', $data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Rak/index', $data);
        $this->load->view('Template/footer');
    }

    public function tambah()
    {

        $kode_rak = $this->input->post('kode_rak');
        $rak = $this->M_rak->tampil();

        if (empty($rak['kode_rak'])) {
            $this->M_rak->tambahData($kode_rak);
            $status = 1;
        } else {
            foreach ($rak as $key => $value) {
                if ($kode_rak == $value['kode_rak']) {
                    $status = 0;
                    break;
                } else {
                    $this->M_rak->tambahData($kode_rak);
                    $status = 1;
                    break;
                }
            }
        }
        echo json_encode($status);
    }

    public function ambil_IdRak()
    {
        $id_rak = $this->input->post('id_rak');
        $rak = $this->M_rak->ambilId($id_rak)->row_array();
        $data = [
            'id_rak' => $rak['id_rak'],
            'kode_rak' => $rak['kode_rak'],
            'kapasitas' => $rak['kapasitas'],
        ];
        echo json_encode($data);
    }

    public function ubah_data()
    {
        $this->M_rak->ubahData();
        $status = 1;
        echo json_encode($status);
    }

    public function hapus()
    {
        $this->M_rak->hapusData();
        $status = 1;
        echo json_encode($status);
    }
}
