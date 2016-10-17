<?php
  class Artikel_model extends CI_Model{

    public function listArtikel()
    {
      $this->db->select('*');
      $this->db->order_by('id','DESC');
      $this->db->from('nbs_post');

      $query = $this->db->get();
      return $query->result_array();
    }

    public function getArtikel($id=0)
    {
      $id = (int)$id;
      $query = $this->db->query("SELECT * FROM nbs_post WHERE id = $id");
      if( $query->num_rows()!=0 )
      {
        return $query->result_array();
      }
      else
      {
        return false;
      }
    }

    public function indexArtikel($offset = 0,$limit = 0)
    {
      $query = $this->db->get_where('nbs_post', array('status' => 1), $limit, $offset);
      return $query->result_array();
    }

    public function getListKategori()
    {
      $this->db->select('*');
      $this->db->order_by('title','ASC');
      $this->db->from('nbs_category');

      $query = $this->db->get();
      return $query->result_array();
    }

    public function edit_artikel($id,$judul,$status,$kategori,$konten,$custom_description)
    {
      $id = (int)$id;
      $judul = $this->db->escape($judul);
      $status = (int)$status;
      $kategori = (int)$kategori;
      $konten = $this->db->escape($konten);
      $custom_description = $this->db->escape($custom_description);

      $query = $this->db->query("UPDATE nbs_post SET title = $judul, description = $konten, cdescription = $custom_description, category_id = $kategori, status = $status WHERE id = $id");
    }

    public function add_artikel($judul,$konten,$link,$status,$kategori,$custom_description,$author)
    {
      $judul = $this->db->escape($judul);
      $konten = $this->db->escape($konten);
      $custom_description = $this->db->escape($custom_description);

      $cekLink = $this->db->query("SELECT id FROM nbs_post WHERE url = '$link'");
      $slug = $link;
      if($cekLink->num_rows()!=0)
      {
        $no = 1;
        while($cekLink->num_rows()!=0)
        {
          $slug = slug($link)."-".$no;
          $cekLink = $this->db->query("SELECT id FROM nbs_post WHERE url = '$slug'");
          $no++;
        }
      }

      $slug = $this->db->escape($slug);

      $cekKategori = $this->db->query("SELECT * FROM nbs_category WHERE id = '$kategori'");
      if($cekKategori->num_rows()==0)
      {
        $ambilAsalKategori = $this->db->query("SELECT id FROM nbs_category LIMIT 1");
        if($ambilAsalKategori->num_rows()!=0)
        {
          $fetchAsalKategori = $ambilAsalKategori->result_array();
          $kategori = (int)$fetchAsalKategori[0]['id'];
        }
        else
        {
          $this->add_kategori("UNCATEGORIZED");
          $ambilAsalKategori = $this->db->query("SELECT id FROM nbs_category LIMIT 1");
          $fetchAsalKategori = $ambilAsalKategori->result_array();
          $kategori = (int)$fetchAsalKategori[0]['id'];
        }
      }

      $do_add = $this->db->query("INSERT INTO nbs_post (title,description,cdescription,category_id,author_id,url,status,hits,TSPost,tahun,bulan) VALUES($judul,$konten,$custom_description,$kategori,$author,$slug,$status,0,'".date("Y-m-d h:i:s")."','".date("Y")."','".date("m")."')");

    }

    public function add_kategori($nama)
    {
      $nama = $this->db->escape($nama);
      $slug = slug($nama);

      $cekSlug = $this->db->query("SELECT * FROM nbs_category WHERE url = '$slug'");
      if($cekSlug->num_rows()!=0)
      {
        $no = 1;
        while($cekSlug->num_rows()!=0)
        {
          $slug = slug($nama)."-".$no;
          $cekSlug = $this->db->query("SELECT * FROM nbs_category WHERE url = '$slug'");
          $no++;
        }
      }
      $query = $this->db->query("INSERT INTO nbs_category (title,url) VALUES ($nama,'$slug')");
    }

    public function delete_artikel($id=0)
    {
      $query = $this->db->query("DELETE FROM nbs_post WHERE id = $id");
    }

  }
