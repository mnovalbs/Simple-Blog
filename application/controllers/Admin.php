<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  protected function isLoggedIn()
  {
    $this->load->model('admin_model');
    $cookie = get_cookie('blog_user',true);
    if($cookie==NULL){
      return 0;
    }else{
      return $this->admin_model->isLoggedIn($cookie);
    }
  }

  protected function arahLogin()
  {
    if(!$this->isLoggedIn())
    {
      redirect('admin/login');
    }
  }

	public function index()
	{
    $this->arahLogin();
    $site = $this->site_model->getSettings();
    $this->load->view('admin/header');
    $this->load->view('admin/dashboard');
    $this->load->view('admin/footer');
	}

  public function login()
  {
    delete_cookie('blog_user',$this->config->item('cookie_url'),'/');
    $this->load->helper(array('form'));

    $this->load->model('admin_model');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username','Username','required',array(
      'required' => 'Username tidak dapat kosong',
    ));
    $this->form_validation->set_rules('password','Password','required',array(
      'required' => 'Password tidak dapat kosong',
    ));

    if($this->form_validation->run()!=false)
    {
      $this->do_login();
    }


    $this->load->view('admin/login');
  }

  protected function do_login()
  {
    if( !empty($this->input->post('username')) && !empty($this->input->post('password')) )
    {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $this->load->model('admin_model');

      if($this->admin_model->do_login($username,$password)!=false)
      {
        $cookie_value = $this->admin_model->do_login($username,$password)[0]['penentu'];
        set_cookie('blog_user',$cookie_value,86400*30,$this->config->item('cookie_url'),'/','',false,true);
        // echo $this->admin_model->do_login($username,$password)[0]['penentu'];
        redirect('admin');
      }
      else
      {
        $this->config->set_item('errors','Password atau Username tidak cocok');
        //echo "<script>alert('Password atau Username tidak cocok');</script>";
      }

    }
  }

  public function logout()
  {
    delete_cookie('blog_user',$this->config->item('cookie_url'),'/');
    redirect('admin/login');
  }

  public function list_artikel()
  {
    $this->load->model('artikel_model');
    $data['artikel'] = $this->artikel_model->listArtikel();
    $this->load->view('admin/header');
    $this->load->view('admin/artikel_list',$data);
    $this->load->view('admin/footer');
  }

  public function list_halaman()
  {
    $this->load->model('page_model');
    $data['page'] = $this->page_model->listPage();
    $this->load->view('admin/header');
    $this->load->view('admin/halaman_list',$data);
    $this->load->view('admin/footer');
  }

  public function add_artikel()
  {
    $this->load->helper(array('form'));
    $this->load->library('form_validation');
    $this->load->model('artikel_model');
    $data['kategori'] = $this->artikel_model->getListKategori();
    $this->load->view('admin/header');

    $setRules = array(
      array(
        'field' => 'title',
        'label' => 'Judul',
        'rules' => 'required|max_length[150]',
        'errors' => array(
          'required' => 'Judul artikel tidak boleh kosong',
          'max_length' => 'Judul artikel tidak dapat lebih dari 150 karakter',
        ),
      ),
      array(
        'field' => 'description',
        'label' => 'Konten',
        'rules' => 'required',
        'errors' => array(
          'required' => 'Konten artikel tidak boleh kosong',
        ),
      ),
      array(
        'field' => 'status',
        'label' => 'Status',
        'rules' => 'greater_than_equal_to[1]|less_than_equal_to[2]|required',
        'errors' => array(
          'required' => 'Status artikel harus dipilih',
          'greater_than_equal_to' => 'Pemilihan status tidak valid',
          'less_than_equal_to' => 'Pemilihan status tidak valid',
        ),
      ),
      array(
        'field' => 'category',
        'label' => 'Kategori',
        'rules' => 'numeric|required',
        'errors' => array(
          'required' => 'Kategori artikel harus dipilih',
          'numeric' => 'Pemilihan kategori tidak valid',
        ),
      ),
    );

    $this->form_validation->set_rules($setRules);

    if($this->form_validation->run()!=false){
      $this->do_add_artikel();
      redirect('admin/list_artikel');
    }

    $this->load->view('admin/artikel_add',$data);
    $this->load->view('admin/footer');
  }

  public function edit_artikel($id=0)
  {
    $id = (int)$id;
    $this->load->helper(array('form'));
    $this->load->library('form_validation');
    $this->load->model('artikel_model');

    if( $this->artikel_model->getArtikel($id)==false )
    {
      die(redirect('admin/list_artikel'));
    }

    $data['artikel'] = $this->artikel_model->getArtikel($id)[0];

    $data['kategori'] = $this->artikel_model->getListKategori();
    $this->load->view('admin/header');

    $setRules = array(
      array(
        'field' => 'title',
        'label' => 'Judul',
        'rules' => 'required|max_length[150]',
        'errors' => array(
          'required' => 'Judul artikel tidak boleh kosong',
          'max_length' => 'Judul artikel tidak dapat lebih dari 150 karakter',
        ),
      ),
      array(
        'field' => 'description',
        'label' => 'Konten',
        'rules' => 'required',
        'errors' => array(
          'required' => 'Konten artikel tidak boleh kosong',
        ),
      ),
      array(
        'field' => 'status',
        'label' => 'Status',
        'rules' => 'greater_than_equal_to[1]|less_than_equal_to[2]|required',
        'errors' => array(
          'required' => 'Status artikel harus dipilih',
          'greater_than_equal_to' => 'Pemilihan status tidak valid',
          'less_than_equal_to' => 'Pemilihan status tidak valid',
        ),
      ),
      array(
        'field' => 'category',
        'label' => 'Kategori',
        'rules' => 'numeric|required',
        'errors' => array(
          'required' => 'Kategori artikel harus dipilih',
          'numeric' => 'Pemilihan kategori tidak valid',
        ),
      ),
    );

    $this->form_validation->set_rules($setRules);

    if($this->form_validation->run()!=false){
      $this->do_edit_artikel($id);
      redirect('admin/list_artikel');
    }

    $this->load->view('admin/artikel_edit',$data);
    $this->load->view('admin/footer');
  }

  protected function do_edit_artikel($id = 0)
  {
    $this->load->model('artikel_model');
    $judul = $this->input->post('title');
    $status = (int)$this->input->post('status');
    $kategori = (int)$this->input->post('category');
    $konten = $this->input->post('description');
    $custom_description = "";

    if( !empty($this->input->post('custom_description')) )
    {
      $custom_description = $this->input->post('custom_description');
    }

    $this->artikel_model->edit_artikel($id,$judul,$status,$kategori,$konten,$custom_description);
  }

  protected function do_add_artikel()
  {
    $this->load->model('artikel_model');
    $this->load->model('admin_model');

    $cookie = get_cookie('blog_user',TRUE);
    $author = 1;

    // print_r($this->admin_model->get_user('',$cookie));
    $author = $this->admin_model->get_user('',$cookie)[0]['id'];
    $judul = $this->input->post('title');
    $status = (int)$this->input->post('status');
    $kategori = (int)$this->input->post('category');
    $konten = $this->input->post('description');
    $link = slug($judul);

    $custom_description = "";

    if( !empty($this->input->post('custom_link')) )
    {
      $link = slug($this->input->post('custom_link'));
    }

    if( !empty($this->input->post('custom_description')) )
    {
      $custom_description = $this->input->post('custom_description');
    }

    $this->artikel_model->add_artikel($judul,$konten,$link,$status,$kategori,$custom_description,$author);
  }

  public function delete_artikel($id=0)
  {
    $id = (int)$id;
    $this->load->model('artikel_model');
    $this->artikel_model->delete_artikel($id);
    redirect('admin/list_artikel');
  }

  public function add_halaman()
  {
    $this->load->helper(array('form'));
    $this->load->library('form_validation');
    $this->load->view('admin/header');

    $setRules = array(
      array(
        'field' => 'title',
        'label' => 'Judul Halaman',
        'rules' => 'required|max_length[150]',
        'error' => array(
          'required' => 'Judul halaman harus terisi',
          'max_length' => 'Judul halaman tidak boleh lebih dari 150 karakter',
        ),
      ),
      array(
        'field' => 'description',
        'label' => 'Konten Halaman',
        'rules' => 'required',
        'error' => array(
          'required' => 'Konten halaman harus terisi',
        ),
      ),
      array(
        'field' => 'status',
        'label' => 'Status Halaman',
        'rules' => 'greater_than_equal_to[1]|less_than_equal_to[2]|required',
        'errors' => array(
          'required' => 'Status halaman harus dipilih',
          'greater_than_equal_to' => 'Pemilihan status tidak valid',
          'less_than_equal_to' => 'Pemilihan status tidak valid',
        ),
      )
    );

    $this->form_validation->set_rules($setRules);

    if($this->form_validation->run()!=false)
    {
      $this->do_add_halaman();
      redirect('admin/list_halaman');
    }

    $this->load->view('admin/halaman_add');
    $this->load->view('admin/footer');
  }

  protected function do_add_halaman()
  {
    $short_title = "";
    if($this->input->post('short_title'))
    {
      $short_title = $this->input->post('short_title');
    }
    $title = $this->input->post('title');
    $konten = $this->input->post('description');
    $status = $this->input->post('status');

    $this->load->model('page_model');
    $this->page_model->addPage($title,$short_title,$konten,$status);
  }

  public function edit_halaman($id=0)
  {
    $id = (int)$id;
    $this->load->helper(array('form'));
    $this->load->library('form_validation');
    $this->load->model('page_model');

    if($this->page_model->getPage($id)!=false)
    {
      $data['page'] = $this->page_model->getPage($id)[0];
      $this->load->view('admin/header');

      $setRules = array(
        array(
          'field' => 'title',
          'label' => 'Judul Halaman',
          'rules' => 'required|max_length[150]',
          'error' => array(
            'required' => 'Judul halaman harus terisi',
            'max_length' => 'Judul halaman tidak boleh lebih dari 150 karakter',
          ),
        ),
        array(
          'field' => 'description',
          'label' => 'Konten Halaman',
          'rules' => 'required',
          'error' => array(
            'required' => 'Konten halaman harus terisi',
          ),
        ),
        array(
          'field' => 'status',
          'label' => 'Status Halaman',
          'rules' => 'greater_than_equal_to[1]|less_than_equal_to[2]|required',
          'errors' => array(
            'required' => 'Status halaman harus dipilih',
            'greater_than_equal_to' => 'Pemilihan status tidak valid',
            'less_than_equal_to' => 'Pemilihan status tidak valid',
          ),
        )
      );

      $this->form_validation->set_rules($setRules);

      if($this->form_validation->run()!=false)
      {
        $this->page_model->editPage($id);
        redirect('admin/list_halaman');
      }

      $this->load->view('admin/halaman_edit',$data);
      $this->load->view('admin/footer');
    }
    else
    {
      redirect('admin/list_halaman');
    }

  }

}
