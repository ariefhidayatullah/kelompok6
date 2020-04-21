<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    public function index(){

        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Halaman Home';
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/footer_admin');
    }

    public function registrasi()
    {

        $this->form_validation->set_rules('nama_admin', 'Nama_admin', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'admin registrasi';
            $this->load->view('templates/header_admin', $data);
            $this->load->view('admin/registrasi');
            $this->load->view('templates/footer_admin');
        } else {
            $this->Admin_model->registrasi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
            redirect('admin');
        }
    }

}