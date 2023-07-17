<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_lantai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_stok_lantai');
        $this->load->model('M_lantai');
        $this->load->model('M_rak');
    }


    public function index()
    {
        $data['title'] = 'Stok Penyimpanan Lantai';
        $data['stok_lantai'] = $this->M_stok_lantai->tampil();
        $data['lantai'] = $this->M_lantai->tampil();
        $data['rak'] = $this->M_rak->tampil();
        $this->load->view('Template/header', $data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Stok_lantai/index', $data);
        $this->load->view('Template/footer');
    }

    public function kode_lantai_otomatis()
    {
        $id_rak = $this->input->post('id_rak');
        $data_lantai = $this->M_stok_lantai->kode_lantai_otomatis($id_rak);
        echo json_encode($data_lantai);
    }

    public function tambah_data()
    {
        $id_lantai = $this->input->post('ID_lantai');
        $stok_l = $this->M_stok_lantai->tampil();
        if (!empty($stok_l)) {
            foreach ($stok_l as $key => $value) {
                if ($id_lantai == $value['id_lantai']) {
                    $status = 0;
                    break;
                } else {
                    $this->M_stok_lantai->tambahData($id_lantai);
                    $status = 1;
                    break;
                }
            }
        } else {
            $this->M_stok_lantai->tambahData($id_lantai);
            $status = 1;
        }


        echo json_encode($status);
    }

    public function ambil_IdStok()
    {
        $id_stok_lantai = $this->input->post('ID_stok_lantai');
        $stok = $this->M_stok_lantai->ambilId($id_stok_lantai)->row_array();
        $data = [
            'id_stok_lantai' => $stok['id_stok_lantai'],
            'id_papan' => $stok['id_papan'],
            'id_lantai' => $stok['id_lantai'],
        ];
        echo json_encode($data);
    }





    public function hapus()
    {
        $this->M_stok_lantai->hapusData();
        $status = 1;
        echo json_encode($status);
    }
}
