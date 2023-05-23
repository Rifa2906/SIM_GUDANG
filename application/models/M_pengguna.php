<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengguna extends CI_Model
{


    public function tampil()
    {
        return $this->db->get('tb_pengguna')->result_array();
    }

    function ambilId($id)
    {
        return $this->db->get_where('tb_pengguna', ['id' => $id]);
    }

    function ubah($id)
    {

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $role = $this->input->post('role');
        $no_telpon = $this->input->post('no_telpon');


        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telpon' => $no_telpon,
            'email' => $email,
            'role' => $role
        ];



        $this->db->where('id_pengguna', $id);
        $this->db->update('tb_pengguna', $data);
    }
}
