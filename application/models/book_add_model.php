<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class book_add_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }


  function addnewbook() {
        $data = array(
          'ISBN' => $this->input->post("ISBN"),
              'BookName' => $this->input->post("BookName"),
              'BookPrice' => $this->input->post("BookPrice"),
              'DatePublish' => $this->input->post("DatePublish"),
              'BestOfCollection' => $this->input->post("BestOfCollection"),
              'number_of_pages' => $this->input->post("number_of_pages"),

      );

      $this->db->insert('books', $data);
      $lastBookID =$this->db->insert_id();

 $EditionNumber = $this->input->post("EditionNumber");
 $PrintDate = $this->input->post("PrintDate");
$sql="insert into edition (EditionNumber, PrintDate, books_ID) values ($EditionNumber, '$PrintDate', $lastBookID)";
$query = $this->db->query($sql);

      $format = $this->input->post("format");
    foreach($format as $format)
    {
      $data = array(
              'books_ID' => $lastBookID,
              'format_idformat' => $format,
      );
      $this->db->insert('format_has_books', $data);
    }

    $author = $this->input->post("author");
  foreach($author as $author)
  {
    $data = array(
            'books_ID' => $lastBookID,
            'author_IdAuthor' => $author,
    );
    $this->db->insert('books_has_author', $data);
  }
  $category = $this->input->post("category");
  foreach($category as $category)
  {
  $data = array(
          'books_ID' => $lastBookID,
          'category_IdCategory' => $category,
  );
  $this->db->insert('category_has_books', $data);
  }
      return ;
      }

  function getformat() {
      $sql = "select * from format";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
    function getauthors() {
      $sql = "select * from author";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
    function getcategory() {
      $sql = "select * from category";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
  
      return $results;
    }
}
