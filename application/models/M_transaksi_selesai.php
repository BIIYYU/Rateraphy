
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi_selesai extends CI_Model
{
    public function getTransaksiSelesai()
    {
        $query = $this->db->query("SELECT * FROM invoice WHERE status_transaksi = '1'");
        return $query->result_array();
    }

    public function cetakBookingById($id)
    {

        $query = $this->db->query("SELECT * FROM booking WHERE id_booking = $id");
        return $query->result_array();
    }

    public function getBookingByDate($startDate, $endDate)
    {
        $query = $this->db->query("SELECT * FROM booking WHERE (status_pembayaran = 'Sudah Bayar DP' OR status_pembayaran = 'Pesanan Selesai') AND tanggal_reservasi BETWEEN '$startDate' AND '$endDate'");
        return $query->result_array();
    }
}
