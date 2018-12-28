<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class login_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function login($username, $password)
  {
    $sql = "select * from admin where UserName ='$username' AND Password='$password'";
    $query = $this->db->query($sql);
    if(count($query->result()) == 1)
    {
      return 1;
    }
    else {
      return 0;
    }
  }

}
