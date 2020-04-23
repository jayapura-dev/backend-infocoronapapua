<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rumahsakit extends CI_model{
    function rs()
    {
        $query = $this->db->query("SELECT * FROM tb_rs_rujukan
        LEFT JOIN tb_kabupaten ON tb_rs_rujukan.id_kabupaten = tb_kabupaten.id_kabupaten");
        return $query->result();
    }
    function create_rs($data)
    {
        $this->db->insert('tb_rs',$data);
    }
}