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
        $this->load->view('Template/header');
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Rak/index', $data);
        $this->load->view('Template/footer');
    }

    public function tambah()
    {

        $kapasitas = $this->input->post('kapasitas');
        $kode_rak = $this->input->post('kode_rak');
        $data = [
            'kode_rak' => $kode_rak,
            'kapasitas' => $kapasitas
        ];

        $this->db->insert('tb_rak', $data);
        $response['status'] = 1;
        echo json_encode($response);
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
        $id_rak = $this->input->post('id_rak_edit');
        $kode_rak_edit = $this->input->post('kode_rak_edit');
        $kapasitas_edit = $this->input->post('kapasitas_edit');


        $data = [
            'kode_rak' => $kode_rak_edit,
            'kapasitas' => $kapasitas_edit
        ];

        $this->db->where('id_rak', $id_rak);
        $this->db->update('tb_rak', $data);
        $response['status'] = 1;
        echo json_encode($response);
    }

    public function hapus()
    {
        $id_rak = $this->input->post('id_rak');
        $this->db->delete('tb_rak', ['id_rak' => $id_rak]);
        $response['status'] = 1;
        echo json_encode($response);
    }
}
