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
}