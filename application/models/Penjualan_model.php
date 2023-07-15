
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class penjualan_model extends CI_Model
{
    public function getAllBooking()
    {

        $query = $this->db->query("SELECT * FROM booking");
        return $query->result_array();
    }
    public function getBookingById($id)
    {
        $query = $this->db->query("SELECT * FROM booking WHERE id_booking = $id");
        return $query->result_array();
    }

    public function getBookingByInvoice($invoice)
    {
        $query = $this->db->query("SELECT * FROM invoice WHERE id_invoice = '$invoice'");
        return $query->row();
    }
    public function getTransaksiByInvoice($invoice)
    {
        $query = $this->db->query("SELECT * FROM invoice  where id_invoice = '$invoice'");
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
