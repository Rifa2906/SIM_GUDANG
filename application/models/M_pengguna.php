<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengguna extends CI_Model
{


    public function tampil()
    {
        return $this->db->get('tb_pengguna')->result_array();
    }

    function tambah_data()
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
    }

    public function ubahData()
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
    }

    function ambilId($id)
    {
        return $this->db->get_where('tb_pengguna', ['id' => $id]);
    }

    function hapusData()
    {
        $id = $this->input->post('id');
        $this->db->delete('tb_pengguna', ['id' => $id]);
    }
}
