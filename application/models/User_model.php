<?php
  class User_model extends CI_Model{

    public function getUser($id=0)
    {
      $id = (int)$id;
      $query = $this->db->query("SELECT * FROM nbs_user WHERE id = $id");
      if($query->num_rows() != 0)
      {
        return $query->result_array();
      }
      else
      {
        return false;
      }
    }

  }
