<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_model{
    function users()
    {
        $query = $this->db->query("SELECT * FROM tb_user
        LEFT JOIN tb_kabupaten ON tb_user.id_kabupaten = tb_kabupaten.id_kabupaten 
        LEFT JOIN tb_user_level ON tb_user.level = tb_user_level.id_level ");
        return $query->result();
    }

    function create_user($data)
    {
        $this->db->insert('tb_user',$data);
    }
}