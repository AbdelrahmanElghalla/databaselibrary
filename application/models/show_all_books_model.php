<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class show_all_books_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }

///
  function showbooks() {
      $sql = " SELECT books.ID, books.BookName, books.ISBN, books.DatePublish,
       books.number_of_pages, books.BookPrice, books.BestOfCollection, edition.EditionNumber, edition.books_ID, edition.PrintDate
       FROM books inner join edition on books.ID=edition.books_ID  ";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }


    function bookauthor() {
      $sql = "SELECT  GROUP_CONCAT( author.AuthorName SEPARATOR ',') BooksAuthors
       FROM ( books_has_author inner join books on books_has_author.books_ID=books.ID )
        inner join author on books_has_author.author_IdAuthor=author.IdAuthor group by books.ID ";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }

    function bookcategory() {
      $sql = " select GROUP_CONCAT( category.CategoryName SEPARATOR ',') bookscategory from
       (books inner join category_has_books on books.ID=category_has_books.books_ID)
       inner join category on category_has_books.category_IdCategory=category.IdCategory  group by books.ID ";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }

    function booksformat() {
      $sql = "  select GROUP_CONCAT( format.formatname SEPARATOR ',') BooksFormat from (books inner join format_has_books on books.ID=format_has_books.books_ID)
      inner join format on format_has_books.format_idformat=format.idformat group by books.ID";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }







}
