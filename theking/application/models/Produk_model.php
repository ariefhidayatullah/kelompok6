<?php 

class Produk_model extends CI_model {
    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array();
    }

    public function tambahDataProduk($data)
    {
        $this->db->insert('produk', $data);
    }

    public function ubahDataProduk($data)
    {
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->update('produk', $data);
    }

    public function getProdukById($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
    }
}