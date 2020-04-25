<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekap extends CI_model{
    function rekapkabkota()
    {
        $query = $this->db->query("SELECT
        tb_kabupaten.id_kabupaten as id_kabupaten,
        tb_kabupaten.nama_kab as nama_kab,
        COUNT(tb_odp.id_odp) as odp,
        COUNT(tb_pdp.id_pdp) as pdp,
        COUNT(tb_suspect.id_suspect) as confirm,
        COUNT(Distinct CASE WHEN status = 'POSITIF' THEN id_suspect END) as positif,
        COUNT(Distinct CASE WHEN status = 'MENINGGAL' THEN id_suspect END) as meninggal,
        COUNT(Distinct CASE WHEN status = 'SEMBUH' THEN id_suspect END) as sembuh
        FROM tb_kabupaten
        LEFT JOIN tb_odp ON tb_kabupaten.id_kabupaten = tb_odp.id_kabupaten
        LEFT JOIN tb_pdp ON tb_kabupaten.id_kabupaten = tb_pdp.id_kabupaten
        LEFT JOIN tb_suspect ON tb_kabupaten.id_kabupaten = tb_suspect.id_kabupaten
        GROUP BY tb_kabupaten.id_kabupaten");

        return $query->result();
    }

    function rekaphari()
    {
        $query = $this->db->query("SELECT * FROM tb_info_rekap");

        return $query->result();
    }

    function create_rekap_hari($data)
    {
        $this->db->insert('tb_info_rekap',$data);
    }

    function rek_odp()
    {
        $query = $this->db->query("SELECT COUNT(id_odp) as jumlah_odp FROM tb_odp ");
        return $query->row_array();
    }
    function rek_pdp()
    {
        $query = $this->db->query("SELECT COUNT(id_pdp) as jumlah_pdp FROM tb_pdp ");
        return $query->row_array();
    }
    function rek_suspect()
    {
        $query = $this->db->query("SELECT 
        COUNT(tb_suspect.id_suspect) as confirm,
        COUNT(Distinct CASE WHEN tb_suspect.status = 'POSITIF' THEN id_suspect END) as positif,
        COUNT(Distinct CASE WHEN tb_suspect.status = 'MENINGGAL' THEN id_suspect END) as meninggal,
        COUNT(Distinct CASE WHEN tb_suspect.status = 'SEMBUH' THEN id_suspect END) as sembuh
        FROM tb_suspect ");

        return $query->result();
    }

    function prosentase()
    {
        $query = $this->db->query("SELECT 
        v_rekap_suspect.Positif / v_rekap_suspect.Confirm * 100 as p_positif,
        v_rekap_suspect.Sembuh / v_rekap_suspect.Confirm * 100 as p_sembuh,
        v_rekap_suspect.Meninggal / v_rekap_suspect.Confirm * 100 as p_meninggal
        FROM v_rekap_suspect ");

        return $query->result();
    }
}