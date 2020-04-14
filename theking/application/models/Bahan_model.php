<?php 

class Bahan_model extends CI_model {
    public function getAllBahan()
    {
        return $this->db->get('bahan')->result_array();
    }

    public function hapusDataBahan($id)
    {
        $this->db->delete('bahan', ['id' => $id]);
    }
}