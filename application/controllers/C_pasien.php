<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('M_pasien');
        $this->model = $this->{'M_pasien'};
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pegawai';
        $data['pasien'] = $this->model->GetAllpasien();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/pasien/V_pasien');
        $this->load->view('admin/layout/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('umur', 'umur', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nik', 'nik', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan</div>');
            redirect('C_pasien');
        } else {
            $this->model->tambah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Data Pasien
          </div>');
            redirect('C_pasien');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengumuman';
        $data['pasien'] = $this->model->getpasienById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/pasien/detail');
        $this->load->view('admin/layout/footer');
    }

    public function proses($id)
    {
        $data['title'] = 'Proses Pasien';
        $data['pasien'] = $this->model->getpasienById($id);
        $data['invoice'] = $this->model->getInvoiceByID($id); 
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/pasien/V_proses_pasien');
        $this->load->view('admin/layout/footer');
    }

    public function proses_tambah_invoice()
    {
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('umur', 'umur', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nik', 'nik', 'required|numeric');
        $this->form_validation->set_rules('tanggal_teraphy', 'tanggal_teraphy', 'required');
        $this->form_validation->set_rules('jam_teraphy', 'jam_teraphy', 'required');
        $this->form_validation->set_rules('keluhan', 'keluhan', 'required');
        $this->form_validation->set_rules('diagnosa', 'diagnosa', 'required');
        $this->form_validation->set_rules('intervensi', 'intervensi', 'required');
        $this->form_validation->set_rules('terapi_ke', 'terapi_ke', 'required');
        
        // echo "<pre>";
        // print_r ($data);
        // echo "</pre>";
        // exit();
        

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan</div>');
            redirect('C_pasien');
        } else {
            $this->model->proses_invoice();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Data Invoice
          </div>');
            redirect('C_pasien');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data';
        $data['pasien'] = $this->model->getpasienById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/pasien/V_edit_pasien');
        $this->load->view('admin/layout/footer');
    }

    public function prosesEdit()
    {
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('umur', 'umur', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nik', 'nik', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal Mengedit Pasien
           </div>');
            redirect('C_pasien');
        } else {
            $this->model->edit();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Mengedit Pasien
          </div>');
            redirect('C_pasien');
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menghapus Pasien.
          </div>');
        redirect('C_pasien');
    }

}
