<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Search extends MY_Controller{

    public function index()
    {
      $page = 1;

      if(!empty($_GET['page']))
      {
        $page = (int)$_GET['page'];
      }

      $this->load->model('artikel_model');
      $q = $kategori = "";

      if(!empty($_GET['q']))
      {
        $q = $_GET['q'];
      }

      if(!empty($_GET['kategori']))
      {
        $kategori = $_GET['kategori'];
      }

      if($page < 1){$page = 1;}
      $limit = $this->config->item('site_post');
      $start = ($page-1)*$limit;
      $this->load->model('artikel_model');
      $artikel = $this->artikel_model->search($q,$kategori,$start,$limit);

      $no = 0;
      foreach ($artikel as $post){
        preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $post['description'], $thumbnail);
        if(isset($thumbnail[1])){
          $originalFile = $thumbnail[1];
          $imageName = pathinfo($thumbnail[1],PATHINFO_BASENAME);
          $imageName = str_replace('%','',$imageName);
        }else{
          $imageName = 'thumb.jpg';
        }

        if(!file_exists(FCPATH.'uploads/'.$imageName))
        {
          $imageName = 'thumb.jpg';
        }

        $thumbnailWidth = 280;
        $thumbnailHeight = 150;
        $this->image_resize($thumbnailWidth,$thumbnailHeight,$imageName);
        $artikel[$no]['thumbnail'] = $imageName;
        $artikel[$no]['thumbnailWidth'] = $thumbnailWidth;
        $artikel[$no]['thumbnailHeight'] = $thumbnailHeight;
        $no++;
      }

      $data['artikel'] = $artikel;
      $data['kategori'] = $this->artikel_model->getListKategori();
      $data['page'] = $page;
      $data['banyak'] = $this->artikel_model->banyakPencarian($q,$kategori);

      $site = $this->site_model->getSettings();
      $this->load->view('default/header.php');
      $this->load->view('default/index.php',$data);
      $this->load->view('default/footer.php');

    }

    public function image_resize($width,$height,$fileName)
    {
      $this->load->library('image_lib');
      $config['image_library']  = 'gd2';
      $config['source_image']   = FCPATH.'uploads/'.$fileName;
      $config['create_thumb']   = FALSE;
      $config['maintain_ratio'] = FALSE;
      $config['width']          = $width;
      $config['height']         = $height;
      $config['new_image']      = FCPATH.'uploads/'.$width.'x'.$height.'/'.$fileName;

      if(!file_exists(FCPATH.'uploads/'.$width.'x'.$height.'/'))
      {
        mkdir(FCPATH.'uploads/'.$width.'x'.$height.'/',0777);
      }

      $this->image_lib->initialize($config);
      if ( ! $this->image_lib->resize())
      {
              echo $this->image_lib->display_errors();
      }
    }

  }
