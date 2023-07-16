
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

    public function getintervensi($id)
    {
        $query = $this->db->query("SELECT DISTINCT
                                        SUBSTRING_INDEX(SUBSTRING_INDEX(invoice.intervensi, ',', numbers.n), ',', -1) AS terteraphy
                                    FROM 
                                        invoice
                                    JOIN 
                                        teraphy ON FIND_IN_SET(teraphy.nama_teraphy, invoice.intervensi) > 0
                                    CROSS JOIN 
                                        (SELECT 1 AS n UNION ALL SELECT 2 UNION ALL SELECT 3) numbers
                                    WHERE 
                                        n <= 1 + LENGTH(intervensi) - LENGTH(REPLACE(intervensi, ',', ''))
                                        AND id_invoice = '$id'");
        return $query->result_array();
    }
}
