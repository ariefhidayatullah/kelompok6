<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index(){
        $data['judul'] = 'Halaman Home';
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/footer_admin');
    }
}