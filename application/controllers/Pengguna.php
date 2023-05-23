<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_pengguna');
    }


    public function index()
    {
        $data['title'] = 'Pengguna';
        $data['pengguna'] = $this->M_pengguna->tampil();
        $this->load->view('Template/header');
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Pengguna/index', $data);
        $this->load->view('Template/footer');
    }

    public function Profile($id)
    {
        $data['title'] = 'Profile';
        $user = $this->db->get_where('tb_pengguna', ['id' => $id])->row_array();
        $this->load->view('Template/header');
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Pengguna/profile', $data);
        $this->load->view('Template/footer');
    }

    public function tambah()
    {

        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $role = $this->input->post('role');
        $no_telpon = $this->input->post('no_telpon');

        $data = [
            'nama' => $nama,
            'role' => $role,
            'no_telpon' => $no_telpon,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'alamat' => $alamat,
        ];

        $this->db->insert('tb_pengguna', $data);
        $response['status'] = 1;
        echo json_encode($response);
    }

    public function ambil_IdPengguna()
    {
        $id = $this->input->post('id');
        $pengguna = $this->M_pengguna->ambilId($id)->row_array();
        $data = [
            'id' => $pengguna['id'],
            'nama' => $pengguna['nama'],
            'alamat' => $pengguna['alamat'],
            'no_telpon' => $pengguna['no_telpon'],
            'email' => $pengguna['email'],
            'role' => $pengguna['role']
        ];
        echo json_encode($data);
    }

    public function ubah_data()
    {
        $id = $this->input->post('id');
        $nama_edit = $this->input->post('nama_edit');
        $email_edit = $this->input->post('email_edit');
        $alamat_edit = $this->input->post('alamat_edit');
        $role_edit = $this->input->post('role_edit');
        $no_telpon_edit = $this->input->post('no_telpon_edit');

        $data = [
            'nama' => $nama_edit,
            'role' => $role_edit,
            'no_telpon' => $no_telpon_edit,
            'email' => $email_edit,
            'alamat' => $alamat_edit
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_pengguna', $data);
        $response['status'] = 1;
        echo json_encode($response);
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->db->delete('tb_pengguna', ['id' => $id]);
        $response['status'] = 1;
        echo json_encode($response);
    }
}
