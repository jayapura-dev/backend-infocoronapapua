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
}