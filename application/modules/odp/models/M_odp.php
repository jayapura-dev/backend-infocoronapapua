<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_odp extends CI_model{
    function odp()
    {
        $query = $this->db->query("SELECT * FROM tb_odp
        LEFT JOIN tb_kabupaten ON tb_odp.id_kabupaten = tb_kabupaten.id_kabupaten
        ORDER BY tb_odp.date_created DESC ");
        return $query->result();
    }
    function create_odp($data)
    {
        $this->db->insert('tb_odp',$data);
    }
}