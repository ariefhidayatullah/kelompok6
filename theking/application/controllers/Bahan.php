<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bahan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar bahan';
        $data['bahan'] = $this->Bahan_model->getAllBahan();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('bahan/index', $data);
        $this->load->view('templates/footer_admin');
    }

    public function hapus($id)
    {
        $this->Bahan_model->hapusDataBahan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('bahan');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Bahan';
        $data['produk'] = $this->Bahan_model->getAllProduk();

        $this->form_validation->set_rules('nama_bahan', 'Nama_bahan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('bahan/tambah', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->Bahan_model->tambahDataBahan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('bahan');
        }
    }

    public function ubah($id)
    {
        $data['judul'] = 'Ubah Data Bahan';
        $data['bahan'] = $this->Bahan_model->getBahanById($id);
        $data['produk'] = $this->Bahan_model->getAllProduk();

        $this->form_validation->set_rules('nama_bahan', 'Nama_bahan', 'required');
        $this->form_validation->set_rules('harga_satuan', 'Harga_satuan', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('bahan/ubah', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->Bahan_model->ubahDataBahan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('bahan');
        }
    }
}