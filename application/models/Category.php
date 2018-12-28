<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class category extends CI_Model {


  function __construct() {
    parent::__construct();
  }
  function all_authors(){
     $sql = "select * from category";
     $query = $this->db->query($sql);
     $results = array();
     foreach ($query->result() as $result) {
       $results[] = $result;
     }
     return $results;
   }

   function add_genere() {
       $data = array(
             'IdCategory' => $this->input->post("IdCategory"),
             'CategoryName' => $this->input->post("CategoryName"),

     );

     $this->db->insert('category', $data);
     return 1;
     }




}
