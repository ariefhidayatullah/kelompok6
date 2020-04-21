<?php 

class Admin_model extends CI_model {

public function registrasi(){
    $email = $this->input->post('email', true);
            $data = [
                'nama_admin' => htmlspecialchars($this->input->post('nama_admin', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'nohp_admin' => htmlspecialchars($this->input->post('nohp_admin', true)),
            ];

            $this->db->insert('admin', $data);
}

}