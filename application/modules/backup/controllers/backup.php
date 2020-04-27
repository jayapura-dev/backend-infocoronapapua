<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends MX_Controller{
  function  __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
  }

  public function index()
  {
    $data['title'] = 'Backup';
    $this->template->load('backend_site','r-backup', $data);
  }
}

