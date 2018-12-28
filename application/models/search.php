<?php
class search extends CI_Model{
  function searchbooks ($BookName) {
    $sql = "SELECT * FROM books  where BookName LIKE '%{$BookName}%'";
    $query = $this->db->query($sql);

    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;

  }
}

 ?>
