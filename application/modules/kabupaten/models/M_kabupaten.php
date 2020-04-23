<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kabupaten extends CI_model{
    function kabkota()
    {
        $query = $this->db->query("SELECT * FROM tb_kabupaten");
        return $query->result();
    }
}