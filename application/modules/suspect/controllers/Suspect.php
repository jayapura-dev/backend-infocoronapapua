<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suspect extends MX_Controller{
  function  __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->model('M_suspect');
  }
  public function data_suspect()
  {
      $data['title'] = 'Data Pasien Suspect';
      $data['suspect'] = $this->M_suspect->suspect();

      $this->template->load('backend_site','r-suspect', $data);
  }
}