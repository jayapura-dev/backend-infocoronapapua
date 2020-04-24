<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends MX_Controller{
  function  __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->model('M_rekap');
  }
  public function kabkota()
  {
    $data['title'] = 'Rekap Data Kabupaten / Kota';
    $data['kabkota'] = $this->M_rekap->rekapkabkota();
    $this->template->load('backend_site','r-rek-kabkota', $data);
  }
}