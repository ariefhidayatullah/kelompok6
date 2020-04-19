<?php 

class Bahan_model extends CI_model {
    public function getAllBahan()
    {
        return $this->db->get('bahan')->result_array();
    }

    public function hapusDataBahan($id)
    {
        $this->db->delete('bahan', ['id_bahan' => $id]);
    }

    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array();
    }

    public function tambahDataBahan()
    {
        $data = [
            "nama_bahan" => $this->input->post('nama_bahan', true),
            "id_produk" => $this->input->post('id_produk', true),
            "harga_satuan" => $this->input->post('harga', true)
        ];

        $this->db->insert('bahan', $data);
    }

    public function getBahanById($id)
    {
        return $this->db->get_where('bahan', ['id_bahan' => $id])->row_array();
    }

    public function ubahDataBahan()
    {
        $data = [
            "nama_bahan" => $this->input->post('nama_bahan', true),
            "id_produk" => $this->input->post('id_produk', true),
            "harga_satuan" => $this->input->post('harga_satuan', true)
        ];

        $this->db->where('id_bahan', $this->input->post('id_bahan'));
        $this->db->update('bahan', $data);
    }

    public function coba(){
       return $this->db->query('SELECT sum(total_harga) as tot FROM produk WHERE status_pemesanan ="pending"')->row_array();
    }
}