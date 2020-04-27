<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller {
  function  __construct()
  {
      parent::__construct();
      $this->load->model('M_api');
  }

  function suspect()
  {
    $suspect = $this->M_api->suspect();
    $data['suspect'] = $suspect;
    $response = array();
    $posts = array();

    foreach($suspect as $item){
        $posts[] = array(
            'id_suspect'    => $item->id_suspect,
            'nama'          => $item->nama,
            'kabupaten'     => $item->nama_kab,
            'umur'          => $item->umur,
            'gender'        => $item->gender,
            'alamat'        => $item->alamat,
            'rumah_sakit'   => $item->rumah_sakit,
            'status'        => $status
        );
    }

    $response['suspect'] = $posts;
    header('Content-Type: application/json');
    echo json_encode($response,TRUE);
  }
}