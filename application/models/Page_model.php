<?php
  class Page_model extends CI_Model{

    public function listPage($id = 0)
    {
      $tambahan = "";
      if($id==1){
        $tambahan = "WHERE status = 1";
      }
      $query = $this->db->query("SELECT id, title, status, url, TSPost, short_title FROM nbs_page ".$tambahan." ORDER BY id DESC");
      return $query->result_array();
    }

    public function addPage($title,$short_title,$konten,$status)
    {
      $slug = slug($title);

      $title = $this->db->escape($title);
      $short_title = $this->db->escape($short_title);
      $konten = $this->db->escape($konten);
      $status = (int)$status;

      $cekLink = $this->db->query("SELECT * FROM nbs_page WHERE url = '$slug'");
      if($cekLink->num_rows()!=0)
      {
        $no = 1;
        while($cekLink->num_rows()!=0)
        {
          $slug = slug($slug)."-".$no;
          $cekLink = $this->db->query("SELECT id FROM nbs_page WHERE url = '$slug'");
          $no++;
        }
      }
      $tanggal = $this->db->escape(date("Y-m-d h:i:s"));
      $slug = $this->db->escape($slug);

      $query = $this->db->query("INSERT INTO nbs_page (title,short_title,content,url,status,TSPost) VALUES($title,$short_title,$konten,$slug,$status,$tanggal)");
    }

    public function getPage($id=0)
    {
      $id = (int)$id;
      $query = $this->db->query("SELECT * FROM nbs_page WHERE id = $id");
      if( $query->num_rows()!=0 )
      {
        return $query->result_array();
      }
      else
      {
        return false;
      }
    }

    public function editPage($id=0)
    {
      $id = (int)$id;
      $title = $this->db->escape($this->input->post('title'));
      $konten = $this->db->escape($this->input->post('description'));
      $short_title = $this->db->escape($this->input->post('short_title'));
      $status = (int)$this->input->post('status');

      $query = $this->db->query("UPDATE nbs_page SET title = $title, short_title = $short_title, content = $konten, status = $status WHERE id = $id");
    }

  }
