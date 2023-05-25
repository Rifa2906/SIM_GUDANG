<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persediaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang');
        $this->load->model('M_persediaan');
        $this->load->model('M_rak');
    }


    public function index()
    {
        $data['title'] = 'Persediaan';
        $data['barang'] = $this->M_barang->tampil();
        $data['persediaan'] = $this->M_persediaan->tampil();
        $data['rak'] = $this->M_rak->tampil();
        $this->load->view('Template/header');
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Persediaan/index', $data);
        $this->load->view('Template/footer');
    }



    public function tambah()
    {

        $id_barang = $this->input->post('id_barang');
        $stok = $this->input->post('stok');

        $data = [
            'id_barang' => $id_barang,
            'stok' => $stok
        ];

        $this->db->insert('tb_persediaan', $data);
        $response['status'] = 1;
        echo json_encode($response);
    }

    public function ambil_IdPersediaan()
    {
        $id_persediaan = $this->input->post('id_persediaan');
        $persediaan = $this->M_persediaan->ambilId($id_persediaan)->row_array();
        $data = [
            'id_persediaan' => $persediaan['id_persediaan'],
            'id_barang' => $persediaan['id_barang'],
            'stok' => $persediaan['stok'],
        ];
        echo json_encode($data);
    }

    public function ubah_data()
    {
        $id_persediaan = $this->input->post('id_persediaan_edit');
        $id_barang_edit = $this->input->post('id_barang_edit');
        $stok_edit = $this->input->post('stok_edit');

        $data = [
            'id_barang' => $id_barang_edit,
            'stok' => $stok_edit
        ];

        $this->db->where('id_persediaan', $id_persediaan);
        $this->db->update('tb_persediaan', $data);
        $response['status'] = 1;
        echo json_encode($response);
    }

    public function hapus()
    {
        $id_persediaan = $this->input->post('id_persediaan');
        $this->db->delete('tb_persediaan', ['id_persediaan' => $id_persediaan]);
        $response['status'] = 1;
        echo json_encode($response);
    }
}
