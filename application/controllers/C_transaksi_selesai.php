<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_transaksi_selesai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('M_transaksi_selesai');
        $this->model = $this->{'M_transaksi_selesai'};
    }

    public function index()
    {
        $data['title'] = 'Transaksi Selesai';
        $data['transaksi'] = $this->model->getTransaksiSelesai();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/transaksi/V_transaksi_selesai');
        $this->load->view('admin/layout/footer');
    }

    public function detail($invoice)
    {
        $data['title'] = 'Detail';
        // $data['booking'] = $this->model->getBookingById($id);
        $data['book'] = $this->model->getBookingByInvoice($invoice);
        $data['menu'] = $this->model->getTransaksiByInvoice($invoice);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/transaksi/detail');
        $this->load->view('admin/layout/footer');
    }

    public function filterLaporantransaksi()
    {
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $data['title'] = 'Transaksi Selesai';
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['booking'] = $this->model->getBookingByDate($startDate, $endDate);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/transaksi/index');
        $this->load->view('admin/layout/footer');
        // echo json_encode($data);
    }

    public function filterCetaktransaksi()
    {
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $profil = $this->getProfilUsaha();
        $data['nama_usaha'] = $profil['nama_usaha'];
        $data['alamat'] = $profil['alamat'];
        $data['title'] = 'Transaksi Selesai';
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['booking'] = $this->model->getBookingByDate($startDate, $endDate);
        $this->load->view('admin/transaksi/invoice', $data);
    }

    public function cetakLaporantransaksi()
    {
        $profil = $this->getProfilUsaha();
        $data['nama_usaha'] = $profil['nama_usaha'];
        $data['alamat'] = $profil['alamat'];
        $data['title'] = 'Transaksi Selesai';
        $data['booking'] = $this->model->getAllBooking();
        $this->load->view('admin/transaksi/invoice', $data);
    }

    public function getProfilUsaha()
    {
        $getProfil = $this->db->query("SELECT * FROM profil_usaha");
        foreach ($getProfil->result_array() as $profil) {
            $arr['nama_usaha'] = $profil['nama_usaha'];
            $arr['deskripsi'] = $profil['deskripsi'];
            $arr['alamat'] = $profil['alamat'];
            $arr['nomor_telepon'] = $profil['nomor_telepon'];
            $arr['maps_link'] = $profil['maps_link'];
            $arr['instagram'] = $profil['instagram'];
            $arr['facebook'] = $profil['facebook'];
            $arr['foto_usaha_1'] = $profil['foto_usaha_1'];
            $arr['foto_usaha_2'] = $profil['foto_usaha_2'];
            $arr['foto_usaha_3'] = $profil['foto_usaha_3'];
        }
        return $arr;
    }

    public function cetakNotatransaksi($invoice)
    {
        $profil = $this->getProfilUsaha();
        $data['nama_usaha'] = $profil['nama_usaha'];
        $data['alamat'] = $profil['alamat'];
        $data['title'] = 'Nota transaksi';
        $data['book'] = $this->model->getBookingByInvoice($invoice);
        $data['menu'] = $this->model->getTransaksiByInvoice($invoice);
        $this->load->view('admin/transaksi/invoice2', $data);
    }
}
