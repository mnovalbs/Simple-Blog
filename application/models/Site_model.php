<?php
class Site_model extends CI_Model{

  public function __construct(){
    $this->load->database();
  }

  public function getSettings(){
    $query = $this->db->query("SELECT * FROM nbs_site_settings ORDER BY id DESC LIMIT 1");
    return $query->row_array();
  }

  public function setSettings($title, $tagline, $description, $keywords, $post_sum, $email)
  {
    $title = $this->db->escape($title);
    $tagline = $this->db->escape($tagline);
    $description = $this->db->escape($description);
    $keywords = $this->db->escape($keywords);
    $post_sum = (int)$post_sum;
    $email = $this->db->escape($email);
    $query = $this->db->query("INSERT INTO nbs_site_settings (title,description,tagline,keywords,post_sum,email) VALUES ($title,$description,$tagline,$keywords,$post_sum,$email)");
  }

  public function getWidgets()
  {
    $query = $this->db->query("SELECT * FROM nbs_site_widgets_sidebar ORDER BY position ASC");
    return $query->result_array();
  }

  public function deleteWidget($id=0)
  {
    $id = (int)$id;
    $query = $this->db->query("DELETE FROM nbs_site_widgets_sidebar WHERE id = $id");
  }

  public function editWidget($id=0,$title="",$konten="")
  {
    $id = (int)$id;
    $title = $this->db->escape($title);
    $konten = $this->db->escape($konten);
    $query = $this->db->query("UPDATE nbs_site_widgets_sidebar SET title = $title, content = $konten WHERE id = $id");
  }

}
