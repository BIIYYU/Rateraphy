
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_invoice extends CI_Model
{
    public function getAllinvoice()
    {

        $query = $this->db->query("SELECT * FROM invoice");
        return $query->result_array();
    }

    public function getinvoiceById($id)
    {

        $query = $this->db->query("SELECT * FROM invoice WHERE id_invoice = $id");
        return $query->result_array();
    }

    public function komplit($data, $id)
    {
        $this->db->where('id_invoice', $id);
        $this->db->update('invoice', $data);
    }

    public function edit()
    {
        $id_invoice = $this->input->post('id_invoice');
        if ($this->input->post('status_pembayaran') == "Belum Bayar DP") {
            $getDataGambar = $this->db->query("SELECT * FROM invoice WHERE id_invoice = $id_invoice");

            foreach ($getDataGambar->result_array() as $gambar) {
                $gambar_bukti = $gambar['bukti_pembayaran'];
            }
            $pathFBukti = "assets/dataresto/bukti_bayar/";
            unlink($pathFBukti . $gambar_bukti);
            $data = [
                "bukti_pembayaran" => "Gambar Salah"
            ];
            $this->db->where('id_invoice', $id_invoice);
            $this->db->update('invoice', $data);
        } else {
            $data = [
                "status_pembayaran" => $this->input->post('status_pembayaran'),
                "total_sudah_dibayar" => $this->input->post('total_sudah_dibayar')
            ];
            $this->db->where('id_invoice', $id_invoice);
            $this->db->update('invoice', $data);
        }
    }

    public function cariDetail($keyword)
    {
        $query = $this->db->query("SELECT * FROM invoice where id_detail_menu like '%$keyword%' ");
        return $query->result_array();
    }

    public function delete($id)
    {
        $this->db->where('id_invoice', $id);
        $this->db->delete('invoice');
    }

    public function save()
    {
        // Upload Gambar
        if (empty($_FILES['bukti_pembayaran']['name'])) {
            $data = [
                "id_invoice" => $this->session->userdata('id_invoice'),
                "bukti_pembayaran" => 'Tidak Ada Gambar'
            ];
            $this->db->insert('invoice', $data);
        } else {
            $file_name = $_FILES['bukti_pembayaran']['name'];
            $newfile_name = str_replace(' ', '', $file_name);
            $config['upload_path']          = './assets/dataresto/invoice/';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $newfile_name;
            $config['file_name']         = $newName;
            $config['max_size']             = 5100;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('bukti_pembayaran')) {
                $this->upload->data('file_name');
                $data = [
                    "id_invoice" => $this->session->userdata('id_invoice'),
                    "bukti_pembayaran" => $newName
                ];
                $this->db->insert('invoice', $data);
            }
        }
    }

    public function uploadBuktiBayar()
    {
        $invoice = $this->input->post('invoice');


        $file_name1 = $_FILES['bukti_pembayaran']['name'];
        $newfile_name1 = str_replace(' ', '', $file_name1);
        $config['upload_path']          = './assets/dataresto/bukti_bayar';
        $newName = date('dmYHis') .  $newfile_name1;
        $config['file_name']         = $newName;
        $config['max_size']             = 10100;
        $config['allowed_types']        = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('bukti_pembayaran')) {
            $data = [
                'bukti_pembayaran' => $newName
            ];

            $this->db->where('id_detail_menu', $invoice);
            $this->db->update('invoice', $data);
        }
    }
}
