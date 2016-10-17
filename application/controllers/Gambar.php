<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index($width,$height,$fileName)
  {
    $this->load->library('image_lib');
    $config['image_library']  = 'gd2';
    $config['source_image']   = './assets/images/'.$fileName;
    $config['create_thumb']   = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']          = $width;
    $config['height']         = $height;
    $config['new_image']      = './assets/images/'.$fileName;

    $this->image_lib->initialize($config);
    $this->image_lib->resize();
  }

}
