<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Post extends MY_Controller {

    public function index($tahun=0,$bulan=0,$url='')
    {
      $this->load->model('artikel_model');
      $artikel = $this->artikel_model->getPost($tahun,$bulan,$url);
      $this->load->view('default/header');
      if($artikel!=false)
      {
        $this->load->view('default/post');
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
