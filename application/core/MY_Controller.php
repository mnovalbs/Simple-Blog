<?php
  class MY_Controller extends CI_Controller{
    public $data = array();
    public $site_name;

    function __construct(){
      parent::__construct();
      $this->load->model('site_model');
      $this->load->config('site_config');
      $site = $this->site_model->getSettings();

      $this->config->set_item('site_title',$site['title']);
      $this->config->set_item('site_post',$site['post_sum']);
    }
  }
