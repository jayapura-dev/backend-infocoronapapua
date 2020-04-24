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

    function update_odp($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    // Move Data From ODP to ODP
    function create_pdp($data)
    {
        $this->db->insert('tb_pdp', $data);
    }

    // Move Data From ODP to Suspect
    function create_suspect($data)
    {
        $this->db->insert('tb_suspect', $data);
    }

    // Delete Data From ODP After Move to PDP Or Suspect
    function delete_odp($where = 0)
    {
        $this->db->delete('tb_odp', array('id_odp' => $where));
    }
}