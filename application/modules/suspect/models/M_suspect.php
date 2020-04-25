<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_suspect extends CI_model{
    function suspect()
    {
        $query = $this->db->query("SELECT * FROM tb_suspect
        LEFT JOIN tb_kabupaten ON tb_suspect.id_kabupaten = tb_kabupaten.id_kabupaten
        LEFT JOIN tb_rs_rujukan ON tb_suspect.id_rs = tb_rs_rujukan.id_rs
        ORDER BY tb_suspect.date_created DESC ");
        return $query->result();
    }
    function create_suspect($data)
    {
        $this->db->insert('tb_suspect',$data);
    }

    function update_suspect($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function delete_suspect($where = 0)
    {
        $this->db->delete('tb_suspect', array('id_suspect' => $where));
    }
}