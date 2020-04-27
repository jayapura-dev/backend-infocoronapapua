<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller{
  function  __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
  }

  public function index()
  {
      $data['title'] = 'Info Corona Papua | Live Data Indonesia & Papua';
      $this->template->load('frontend_site','home',$data);
  }
}