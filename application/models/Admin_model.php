<?php
class Admin_model extends CI_Model{

  public function isLoggedIn($cookie)
  {
    $cookie = $this->db->escape($cookie);
    $this->db->from('nbs_user');
    $this->db->where('penentu = '.$cookie);
    $this->db->where('permission = 1');
    $query = $this->db->get();
    if($query->num_rows() != 0){
      return 1;
    }else{
      return 0;
    }
  }

  public function get_user($id=0,$kunci='')
  {
    if( !empty($kunci) )
    {
      $kunci = $this->db->escape($kunci);
      $query = $this->db->query("SELECT * FROM nbs_user WHERE penentu = $kunci");
      if( $query->num_rows()!=0 )
      {
        return $query->result_array();
      }
    }
  }

  public function do_login($username,$password)
  {
    $username = $this->db->escape($username);
    $password = $this->db->escape(md5($password));
    $this->db->select('penentu');
    $this->db->from('nbs_user');
    $this->db->where("username = ".$username);
    $this->db->where("password = ".$password);
    $this->db->where("permission = 1");
    $this->db->limit(1);

    $query = $this->db->get();

    if($query->num_rows()==1){
      return $query->result_array();
    }else{
      return false;
    }
  }

}
