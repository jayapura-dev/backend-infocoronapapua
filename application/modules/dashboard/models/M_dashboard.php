<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_model{
    function rekap_suspect()
    {
        $query = $this->db->query("SELECT 
        COUNT(Distinct tb_suspect.id_suspect) as Confirm,
        COUNT(Distinct CASE WHEN tb_suspect.status = 'POSITIF' THEN tb_suspect.id_suspect END) as Positif,
        COUNT(Distinct CASE WHEN tb_suspect.status = 'SEMBUH' THEN tb_suspect.id_suspect END) as Sembuh,
        COUNT(Distinct CASE WHEN tb_suspect.status = 'MENINGGAL' THEN tb_suspect.id_suspect END) as Meninggal
        FROM tb_suspect ");
    
        return $query->result();
    }
    
    function prosentase_suspect()
    {
        $query = $this->db->query("SELECT 
        v_rekap_suspect.Positif / v_rekap_suspect.Confirm * 100 as p_positif,
        v_rekap_suspect.Sembuh / v_rekap_suspect.Confirm * 100 as p_sembuh,
        v_rekap_suspect.Meninggal / v_rekap_suspect.Confirm * 100 as p_meninggal
        FROM v_rekap_suspect ");

        return $query->result();
    }

    function topsuspectkasus()
    {
        $query = $this->db->query("SELECT * FROM v_jumlah_suspect
        ORDER BY jumlah_suspect DESC LIMIT 3; ");
        return $query->result();
    }

    function odp_notif()
    {
        $tanggal_sekarang = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(id_odp) as odp_hari_ini FROM tb_odp WHERE date_created = '$tanggal_sekarang' ");
        return $query->row_array();
    }

    function odp_notif_data()
    {
        $tanggal_sekarang = date('y-m-d');
        $query = $this->db->query("SELECT 
        COUNT(id_odp) as jo,
        tb_odp.date_created as date_created,
        tb_kabupaten.nama_kab as nama_kab,
        tb_kabupaten.id_kabupaten as id_kabupaten
        FROM tb_odp 
        LEFT JOIN tb_kabupaten ON tb_odp.id_kabupaten = tb_kabupaten.id_kabupaten
        WHERE date_created = '$tanggal_sekarang' 
        GROUP BY tb_odp.id_kabupaten ");

        return $query->result();
    }

    function pdp_notif()
    {
        $tanggal_sekarang = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(id_pdp) as pdp_hari_ini FROM tb_pdp WHERE date_created = '$tanggal_sekarang' ");
       
        return $query->row_array();
    }

    function pdp_notif_data()
    {
        $tanggal_sekarang = date('y-m-d');
        $query = $this->db->query("SELECT 
        COUNT(id_pdp) as jp,
        tb_pdp.date_created as date_created,
        tb_kabupaten.nama_kab as nama_kab,
        tb_kabupaten.id_kabupaten as id_kabupaten
        FROM tb_pdp
        LEFT JOIN tb_kabupaten ON tb_pdp.id_kabupaten = tb_kabupaten.id_kabupaten
        WHERE date_created = '$tanggal_sekarang' 
        GROUP BY tb_pdp.id_kabupaten ");

        return $query->result();
    }

    function suspect_notif()
    {
        $tanggal_sekarang = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(id_suspect) as suspect_hari_ini FROM tb_suspect WHERE date_created = '$tanggal_sekarang' ");
       
        return $query->row_array();
    }

    function suspect_notif_data()
    {
        $tanggal_sekarang = date('y-m-d');
        $query = $this->db->query("SELECT 
        COUNT(id_suspect) as js,
        tb_suspect.date_created as date_created,
        tb_kabupaten.nama_kab as nama_kab,
        tb_kabupaten.id_kabupaten as id_kabupaten
        FROM tb_suspect
        LEFT JOIN tb_kabupaten ON tb_suspect.id_kabupaten = tb_kabupaten.id_kabupaten
        WHERE date_created = '$tanggal_sekarang' 
        GROUP BY tb_suspect.id_kabupaten ");

        return $query->result();
    }

    function odp_kabkota()
    {
        $query = $this->db->query("SELECT * FROM v_jumlah_odp ORDER BY jumlah_odp DESC ");

        return $query->result();
    }

    function pdp_kabkota()
    {
        $query = $this->db->query("SELECT * FROM v_jumlah_pdp ORDER BY jumlah_pdp DESC ");

        return $query->result();
    }

    function suspect_kabkota()
    {
        $query = $this->db->query("SELECT * FROM v_jumlah_suspect ORDER BY jumlah_suspect DESC ");

        return $query->result();
    }
}