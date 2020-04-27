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
    $data['odp'] = $this->M_dashboard->odp_kabkota();
    $data['pdp'] = $this->M_dashboard->pdp_kabkota();
    $data['sus'] = $this->M_dashboard->suspect_kabkota();
    $this->template->load('backend_site','r-dashboard',$data);
  }

}
