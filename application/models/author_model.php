<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class author_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }
  function all_authors(){
     $sql = "select * from author";
     $query = $this->db->query($sql);
     $results = array();
     foreach ($query->result() as $result) {
       $results[] = $result;
     }
     return $results;
   }

   function addauthor() {
       $data = array(
             'IdAuthor' => $this->input->post("IdAuthor"),
             'AuthorName' => $this->input->post("AuthorName"),

     );

     $this->db->insert('author', $data);
     return 1;
     }




}
