<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Papan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_lantai');
        $this->load->model('M_rak');
        $this->load->model('M_papan');
    }

    public function index()
    {
        $data['title'] = 'Papan';
        $data['lantai'] = $this->M_lantai->tampil();
        $data['rak'] = $this->M_rak->tampil();
        $data['papan'] = $this->M_papan->tampil();
        $this->load->view('Template/header',$data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Papan/index', $data);
        $this->load->view('Template/footer');
    }

    public function kode_lantai_otomatis()
    {
        $id_rak = $this->input->post('id_rak');
        $data = $this->M_papan->kode_lantai($id_rak);
        echo json_encode($data);
    }


    public function tambah()
    {

        $kode_papan = $this->input->post('kode_papan');
        $papan = $this->M_papan->tampil();
        if (!empty($papan['kode_papan'])) {
            foreach ($papan as $key => $value) {
                if ($kode_papan == $value['kode_papan']) {
                    $status = 0;
                    break;
                } else {
                    $this->M_papan->tambahData($kode_papan);
                    $status = 1;
                    break;
                }
            }
        } else {
            $this->M_papan->tambahData($kode_papan);
            $status = 1;
        }

        echo json_encode($status);
    }

    public function ambil_IdPapan()
    {
        $id_papan = $this->input->post('id_papan');
        $papan = $this->M_papan->ambilId($id_papan)->row_array();
        $data = [
            'id_papan' => $papan['id_papan'],
            'id_rak' => $papan['id_rak'],
            'id_lantai' => $papan['id_lantai'],
            'kode_papan' => $papan['kode_papan'],
            'kapasitas_papan' => $papan['kapasitas_papan'],
            'no_urut' => $papan['no_urut'],
        ];
        echo json_encode($data);
    }

    public function ubah_data()
    {
        $this->M_papan->ubahData();
        $status = 1;
        echo json_encode($status);
    }

    public function hapus()
    {
        $this->M_papan->hapusData();
        $status = 1;
        echo json_encode($status);
    }
}
