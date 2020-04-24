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
}