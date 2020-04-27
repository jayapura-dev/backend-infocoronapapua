<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pdp extends CI_model{
    function pdp()
    {
        $query = $this->db->query("SELECT 
        tb_pdp.id_pdp as id_pdp,
        tb_pdp.nama as nama,
        tb_pdp.gender as gender,
        tb_pdp.umur as umur,
        tb_pdp.alamat as alamat,
        tb_pdp.kontak as kontak,
        tb_pdp.id_rs as id_rs,
        tb_pdp.id_kabupaten as id_kabupaten,
        tb_pdp.is_from as is_from,
        tb_pdp.date_created as date_created,
        tb_kabupaten.nama_kab as nama_kab,
        tb_rs_rujukan.rumah_sakit as rumah_sakit
        FROM tb_pdp 
        LEFT JOIN tb_kabupaten ON tb_pdp.id_kabupaten = tb_kabupaten.id_kabupaten
        LEFT JOIN tb_rs_rujukan ON tb_pdp.id_rs = tb_rs_rujukan.id_rs
        ORDER BY tb_pdp.date_created DESC ");
        return $query->result();
    }
    function create_pdp($data)
    {
        $this->db->insert('tb_pdp',$data);
    }

    function update_pdp($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    // Move Data From PDP to Suspect
    function create_suspect($data)
    {
        $this->db->insert('tb_suspect', $data);
    }

    // Delete Data From PDP After Move to Suspect
    function delete_pdp($where = 0)
    {
        $this->db->delete('tb_pdp', array('id_pdp' => $where));
    }

    // Level User

    function user_pdp()
    {
        $id_kabupaten = $this->session->userdata('id_kabupaten');
        $query = $this->db->query("SELECT 
        tb_pdp.id_pdp as id_pdp,
        tb_pdp.nama as nama,
        tb_pdp.gender as gender,
        tb_pdp.umur as umur,
        tb_pdp.alamat as alamat,
        tb_pdp.kontak as kontak,
        tb_pdp.id_rs as id_rs,
        tb_pdp.id_kabupaten as id_kabupaten,
        tb_pdp.is_from as is_from,
        tb_pdp.date_created as date_created,
        tb_kabupaten.nama_kab as nama_kab,
        tb_rs_rujukan.rumah_sakit as rumah_sakit
        FROM tb_pdp 
        LEFT JOIN tb_kabupaten ON tb_pdp.id_kabupaten = tb_kabupaten.id_kabupaten
        LEFT JOIN tb_rs_rujukan ON tb_pdp.id_rs = tb_rs_rujukan.id_rs
        WHERE tb_pdp.id_kabupaten = '$id_kabupaten'
        ORDER BY tb_pdp.date_created DESC ");
        return $query->result();
    }
}