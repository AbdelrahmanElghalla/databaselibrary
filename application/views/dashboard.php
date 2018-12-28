<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">

	<title> DashBoard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>include/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>include/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>include/js/bootstrap.min.js"></script>






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
<nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="197" id="navs">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>

			</button>
			<a href="<?php echo base_url();?>index.php/library/logout" class="navbar-brand">Log out </a>
		</div>




	<div><h1><center>welcome to E-library management system</center></h1></div>
	<a href="<?php echo base_url();?>index.php/library/add_authors" /><input type="button" value="Add author" /></a><br>
<a href="<?php echo base_url();?>index.php/library/add_genere" /><input type="button" value="Add genre" /></a><br>
<a href="<?php echo base_url();?>index.php/library/add_book" /><input type="button" value="Add Book" /></a><br>
<a href="<?php echo base_url();?>index.php/library/allauthors" /><input type="button" value="All authors" /></a><br>
<a href="<?php echo base_url();?>index.php/library/show_books" /><input type="button" value="All Book" /></a><br>
<a href="<?php echo base_url();?>index.php/library/search_books" /><input type="button" value="Book search" /></a><br>





</body>
</html>
