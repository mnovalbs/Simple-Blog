<?php
class Site_model extends CI_Model{

  public function __construct(){
    $this->load->database();
  }

  public function getSettings(){
    $query = $this->db->query("SELECT * FROM nbs_site_settings ORDER BY id DESC LIMIT 1");
    return $query->row_array();
  }

}
