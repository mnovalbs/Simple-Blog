<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Post extends MY_Controller {

    public function index($tahun=0,$bulan=0,$url='')
    {
      // echo $tahun;
      $this->load->model('artikel_model');
      $artikel = $this->artikel_model->getPost($tahun,$bulan,$url);
      $this->load->view('default/header');
      if($artikel!=false)
      {
        $data['artikel'] = $artikel;
        $this->load->view('default/post',$data);
      }
      else
      {
        // $this->load->config('site_config');
        // $this->config->set_item('errors','Artikel tidak ditemukan');
        $data['danger'] = 'danger';
        $data['text'] = 'Artikel tidak ditemukan';
        $this->load->view('default/error',$data);
      }
      $this->load->view('default/footer');
    }

  }

?>
