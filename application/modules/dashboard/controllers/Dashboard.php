<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends MX_Controller{
  function  __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->model('M_dashboard');
  }
  public function index()
  {
    $data['title'] = 'Dashboard | Backend';
    $data['suspect'] = $this->M_dashboard->rekap_suspect();
    $data['prosentase'] = $this->M_dashboard->prosentase_suspect();
    $data['topsuspect'] = $this->M_dashboard->topsuspectkasus();
    $this->template->load('backend_site','r-dashboard',$data);
  }
}
