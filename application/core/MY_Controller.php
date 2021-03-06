<?php
  class MY_Controller extends CI_Controller{
    public $data = array();
    public $site_name;

    function __construct(){
      parent::__construct();
      $this->load->model('site_model');
      $this->load->model('page_model');
      $this->load->model('artikel_model');
      $this->load->config('site_config');
      $site = $this->site_model->getSettings();
      $sidebar = $this->site_model->getWidgets();
      $pages = $this->page_model->listPage(1);
      $popularPost = $this->artikel_model->popular();

      $this->config->set_item('site_title',$site['title']);
      $this->config->set_item('site_post',$site['post_sum']);
      $this->config->set_item('sidebar',$sidebar);
      $this->config->set_item('page_list',$pages);
      $this->config->set_item('popular_post',$popularPost);
    }
  }
