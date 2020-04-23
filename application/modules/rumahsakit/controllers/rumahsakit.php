<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumahsakit extends MX_Controller{
  function  __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->model('M_rumahsakit');
  }
  public function index()
  {
    $data['title'] = 'Data Kabupaten / Kota';
    $data['rs'] = $this->M_rumahsakit->rs();
    $this->template->load('backend_site','r-rumahsakit', $data);
  }
}