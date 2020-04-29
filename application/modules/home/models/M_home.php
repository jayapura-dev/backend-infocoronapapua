<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_model{
    function rekapkabkota()
    {
        $query = $this->db->query("SELECT
        tb_kabupaten.id_kabupaten as id_kabupaten,
        tb_kabupaten.nama_kab as nama_kab,
        COUNT(tb_suspect.id_suspect) as confirm,
        COUNT(Distinct CASE WHEN tb_suspect.status = 'POSITIF' THEN id_suspect END) as positif,
        COUNT(Distinct CASE WHEN tb_suspect.status = 'MENINGGAL' THEN id_suspect END) as meninggal,
        COUNT(Distinct CASE WHEN tb_suspect.status = 'SEMBUH' THEN id_suspect END) as sembuh
        FROM tb_suspect
        LEFT JOIN tb_kabupaten ON tb_suspect.id_kabupaten = tb_kabupaten.id_kabupaten
        GROUP BY tb_kabupaten.id_kabupaten");

        return $query->result();
    }
}