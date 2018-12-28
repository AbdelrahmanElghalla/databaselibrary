<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Update book</title>


</head>
<style media="screen">
		body{
		background: url('http://i65.tinypic.com/wbqesj.jpg') no-repeat center center fixed;

		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		}
		</style>
	<div><h1><center>Updated book</center></h1></div>
	<h3><center>Book updated Successfully </center></h3>


<a href="<?php echo base_url();?>/index.php/library/show_books"><br>show all books</a>


</body>
</html>
