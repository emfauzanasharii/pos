<?php
class Mlogin extends CI_Model{
    function cekadmin($u,$p){
        $hasil=$this->db->query("SELECT * from tbl_user where user_username='$u'and user_password=md5('$p') ");
        return $hasil;
    }
  
}
