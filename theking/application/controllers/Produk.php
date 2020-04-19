<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
    }

    public function index()
    {
        $data['judul'] = 'Daftar produk';
        $data['produk'] = $this->Produk_model->getAllProduk();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer_admin');
    }

    // public function hapus($id)
    // {
    //     $this->Bahan_model->hapusDataBahan($id);
    //     $this->session->set_flashdata('flash', 'Dihapus');
    //     redirect('bahan');
    // }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Produk';

        $this->form_validation->set_rules('jenis_produk', 'Jenis_produk', 'required|trim|valid_email');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('produk/tambah', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $jenis_produk   = $this->input->post('jenis_produk');
            $deskripsi   = $this->input->post('deskripsi');
            $harga   = $this->input->post('harga');
            $ukuran   = $this->input->post('ukuran');

        $config['upload_path'] = './assets/img';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['gambar']['name'];

      $this->upload->initialize($config);

	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	            $data = array(
	                          'jenis_produk'       => $jenis_produk,
                              'deskripsi'     => $deskripsi,
                              'harga'     => $harga,
                              'ukuran'     => $ukuran,
                              'gambar'       => $gambar['file_name'],
	                        );
							$this->Produk_model->tambahDataProduk($data);
                            $this->session->set_flashdata('flash', 'Ditambahkan');
                            redirect('produk');
	        }else {
              die("gagal upload");
	        }
	    }else {
	      echo "tidak masuk";
	    }
        }
    }

    public function ubah($id)
    {
        $data['judul'] = 'Tambah Data Produk';
        $data['produk'] = $this->Produk_model->getProdukById($id);

        $this->form_validation->set_rules('jenis_produk', 'Jenis_produk', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('produk/ubah', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $jenis_produk   = $this->input->post('jenis_produk');
            $deskripsi   = $this->input->post('deskripsi');
            $harga   = $this->input->post('harga');
            $ukuran   = $this->input->post('ukuran');

            $data = array(
                'jenis_produk'       => $jenis_produk,
                'deskripsi'     => $deskripsi,
                'harga'     => $harga,
                'ukuran'     => $ukuran
              );


            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['produk']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }
            $this->Produk_model->ubahDataProduk($data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('produk');

        }
    }
}