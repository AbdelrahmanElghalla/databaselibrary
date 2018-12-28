<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>books</title>


</head>
<style media="screen">
		body{
		background: url('http://i67.tinypic.com/fkz2pk.jpg') no-repeat center center fixed;

		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		}
		</style>
	<div><h1>Search  books By Name</h1></div>

	<form action="<?php echo base_url(); ?>/index.php/library/search_books" method="post">
   BookName: <input type="text" name="BookName"><br>
	 <a href="<?php echo base_url();?>/index.php/library/dashboard"><br>go back</a>

   <input type="submit" value="Submit">
 </form>
 <?php
 if(isset($books))
 {
	 if(count($books) == 0)
	 {
		 echo "no results found";
	 }
	 else {
	 	echo '<div><h1>Search result</h1></div>
	  <div class="divTable">
	  <div class="divTableHeading">
	  <div class="divTableRow">
		<div class="divTableHead">ISBN</div>
	  <div class="divTableHead">BookName</div>
    <div class="divTableHead">DatePublish</div>
    <div class="divTableHead">Number_of_pages</div>

	  </div>
	  </div>
	  <div class="divTableBody">';
	  			foreach ($books as $s) {
	  				echo '<div class="divTableRow">';
						echo '<div class="divTableCell">'.$s->ISBN.'</div>';
	  				echo '<div class="divTableCell">'.$s->BookName.'</div>';
            echo '<div class="divTableCell">'.$s->DatePublish.'</div>';
            echo '<div class="divTableCell">'.$s->number_of_pages.'</div>';



	  				echo '</div>';
	  			}
	  	echo"</div></div>";
	 }
	}
 ?>
