<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class edit_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function getbooksandedition($id)
    {
      $sql = "select * from books inner join edition on books.ID=edition.books_ID where books.ID=$id";
      $query = $this->db->query($sql);
      return $query->result();
    }
    function getbooksauthor($id)
              {
                $sql = "select * from books_has_author where books_ID=$id";
                  $query = $this->db->query($sql);
                    $results = array();
                    foreach ($query->result() as $result) {
                      $results[] = $result;
                    }
                    return $results;
                  }
                  function getbookformat($id)
                            {
                              $sql = "select * from format_has_books where books_ID=$id";
                                $query = $this->db->query($sql);
                                  $results = array();
                                  foreach ($query->result() as $result) {
                                    $results[] = $result;
                                  }
                                  return $results;
                                }
                                function getbookscategory($id)
                                    {
                                      $sql = "select * from category_has_books where books_ID=$id";
                                        $query = $this->db->query($sql);
                                          $results = array();
                                          foreach ($query->result() as $result) {
                                            $results[] = $result;
                                          }
                                          return $results;
                                        }

                                        function updateitem() {
                                          $id = $this->input->post("ID");

                                            $isbn = $this->input->post("ISBN");
                                            $name = $this->input->post("BookName");
                                            $price = $this->input->post("BookPrice");
                                            $datepublish = $this->input->post("DatePublish");
                                            $bestofcollection = $this->input->post("BestOfCollection");
                                            $numberofpages = $this->input->post("number_of_pages");



                                            $sql = "update books
                                            set BookName='$name',
                                            ISBN=$isbn,
                                            DatePublish='$datepublish',
                                            BookPrice=$price,
                                            BestOfCollection='$bestofcollection',
                                              number_of_pages=$numberofpages
                                            where ID=$id";
                                            $query = $this->db->query($sql);


                                            $editionnumber = $this->input->post("EditionNumber");
                                            $printdate = $this->input->post("PrintDate");

                                            $sql = "update edition
                                            set
                                            EditionNumber=$editionnumber,
                                            PrintDate='$printdate'
                                            where books_ID=$id";
                                            $query = $this->db->query($sql);


                                            $sql = "delete from books_has_author where books_ID = $id";
                                            $query = $this->db->query($sql);

                                            $author = $this->input->post("author");
                                            if(!isset($author))
                                            {
                                              return 1;
                                            }
                                            foreach($author as $author)
                                            {

                                              $data = array(
                                                      'books_ID' => $id,
                                                      'author_IdAuthor' => $author,
                                              );
                                              $this->db->insert('books_has_author', $data);
                                            }

                                            $sql = "delete from category_has_books where books_ID = $id";
                                            $query = $this->db->query($sql);

                                            $category = $this->input->post("category");
                                            if(!isset($category))
                                            {
                                              return 1;
                                            }
                                            foreach($category as $category)
                                            {
                                              $data = array(
                                                      'books_ID' => $id,
                                                      'category_IdCategory' => $category,
                                              );
                                              $this->db->insert('category_has_books', $data);
                                            }


                                            $sql = "delete from format_has_books where books_ID = $id";
                                            $query = $this->db->query($sql);

                                            $format = $this->input->post("format");
                                            if(!isset($format))
                                            {
                                              return 1;
                                            }
                                            foreach($format as $format)
                                            {
                                              $data = array(
                                                      'books_ID' => $id,
                                                      'format_idformat' => $format,
                                              );
                                              $this->db->insert('format_has_books', $data);
                                            }


                                            return 1;
                                          }

                                          
                                        function deletebook($id) {
                                          $sql = "delete from books where ID = $id";
                                        $query = $this->db->query($sql);
                                          return 1;
                                          }




}
