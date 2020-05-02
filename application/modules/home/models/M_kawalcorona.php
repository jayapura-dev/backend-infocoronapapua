<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kawalcorona extends CI_model{
  function liveindo()
  {
    $url =  "https://api.kawalcorona.com/indonesia/";
    
	$ch = curl_init();
  	curl_setopt($ch, CURLOPT_URL, $url);
  	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);

	$data = curl_exec($ch);
	$response = json_decode($data,true);
	return $response;
  }
}