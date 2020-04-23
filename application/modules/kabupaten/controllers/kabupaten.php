<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends MX_Controller{
  function  __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->model('M_kabupaten');
  }
  public function index()
  {
    $data['title'] = 'Data Kabupaten / Kota';
    $data['kabkota'] = $this->M_kabupaten->kabkota();
    $this->template->load('backend_site','r-kabkota', $data);
  }
}