<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pasien extends CI_Model
{

    public function GetAllpasien()
    {
        $query = $this->db->query("SELECT * FROM pasien");
        return $query->result_array();
    }


    public function getpasienById($id)
    {
        $query = $this->db->query("SELECT * FROM pasien where id_pasien = $id");
        return $query->result_array();
    }

    public function getInvoiceByID($id){
        $query = $this->db->query("SELECT * FROM invoice WHERE id_invoice = $id");
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

    public function proses_invoice()
    {
        {
            $data = [
                "nama_pasien"     => $this->input->post('nama_pasien'),
                "umur"            => $this->input->post('umur'),
                "alamat"          => $this->input->post('alamat'),
                "nik"             => $this->input->post('nik'),
                "tanggal_teraphy" => $this->input->post('tanggal_teraphy'),
                "jam_teraphy"     => $this->input->post('jam_teraphy'),
                "keluhan"         => $this->input->post('keluhan'),
                "diagnosa"        => $this->input->post('diagnosa'),
                "intervensi"      => $this->input->post('intervensi'),
                "terapi_ke"       => $this->input->post('terapi_ke')
            ];

            // print_r($data);exit();
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
