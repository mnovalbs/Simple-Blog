<?php
  class Kategori_model extends CI_Model{

    public function listKategori()
    {
      $query = $this->db->query("SELECT * FROM nbs_category ORDER BY title ASC");
      return $query->result_array();
    }

    public function addKategori($nama)
    {
      $link = slug($nama);
      $nama = $this->db->escape($nama);
      $slug = $link;
      $cekLink = $this->db->query("SELECT id FROM nbs_category WHERE url = '$slug'");
      if($cekLink->num_rows()!=0)
      {
        $no = 1;
        while($cekLink->num_rows()!=0)
        {
          $slug = slug($link)."-".$no;
          $cekLink = $this->db->query("SELECT id FROM nbs_category WHERE url = '$slug'");
          $no++;
        }
      }
      $slug = $this->db->escape($slug);
      $query = $this->db->query("INSERT INTO nbs_category (title,url) VALUES($nama,$slug)");
    }

    public function deleteKategori($id=0)
    {
      $id = (int)$id;
      $query = $this->db->query("DELETE FROM nbs_category WHERE id = $id");
    }

  }
