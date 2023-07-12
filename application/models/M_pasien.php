<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pasien extends CI_Model
{

    public function GetAllpasien()
    {
        $query = $this->db->query("SELECT * FROM pasien ORDER BY nama_pasien ASC");
        return $query->result_array();
    }


    public function getpasienById($id)
    {
        $query = $this->db->query("SELECT * FROM pasien where id_pasien = $id");
        return $query->result_array();
    }

    public function getInvoiceByID($id){
        $query = $this->db->query("SELECT * FROM invoice WHERE id_invoice = $id ORDER BY id_invoice ASC");
        return $query->result_array();
    }

    public function getkeluhan(){
        $query = $this->db->query("SELECT nama_teraphy, harga FROM teraphy ORDER BY nama_teraphy ASC");
        return $query->result_array();
    }

    public function tambah()
    {
        {
            $data = [
                "nama_pasien" => $this->input->post('nama_pasien'),
                "umur"        => $this->input->post('umur'),
                "nik"         => $this->input->post('nik'),
                "alamat"      => $this->input->post('alamat')
            ];
            $this->db->insert('pasien', $data);
        }
    }

    public function proses_invoice($data)
    {
        {
            $this->db->insert('invoice', $data);
        }
    }

    public function edit()
    {
        $data = [
            "nama_pasien" => $this->input->post('nama_pasien'),
            "umur"        => $this->input->post('umur'),
            "nik"         => $this->input->post('nik'),
            "alamat"      => $this->input->post('alamat')
        ];
        $this->db->where('id_pasien', $this->input->post('id_pasien'));
        $this->db->update('pasien', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_pasien', $id);
        $this->db->delete('pasien');
    }
}
