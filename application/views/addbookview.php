<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>

	<title>Add Book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>include/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>include/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>include/js/bootstrap.min.js"></script>

	<style type="text/css">
		html{
		    min-height:100%;
		    position:relative;
		}
		body{
		    height:100%;
		}
		#navs{
			margin-bottom: 0px;
			background: #dc9d62 !important;
			border: 2px solid #dc9d62;
			width: 100%;
		}
		#sidebar{
			background: #e6b98f;
			margin-top: 0px;
			border: 2px solid #dc9d62;
			width: 20%;
			position:fixed;
		    top:50px;
		    bottom:0;
		    left:0;
		    right:0;
		    overflow:hidden;
		}
		#content {
			margin-left: 20%;
			margin-top: 50px;
			width: 80%;
			position:fixed;
		    top:0;
		    bottom:0;
		    left:0;
		    right:0;
		    overflow:scroll;


	</style>




	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
				function validateForm()
			 {
					//if( document.forms["addbook"]["isbn"].value == "" )
					//{
						 //alert( "Please provide book isbn" );
						 //return false;
					//}
					if( document.forms["addbook"]["BookName"].value == "" )
					{
						 alert( "Please provide booktitle!" );
						 return false;
					}


				 if( document.forms["addbook"]["ISBN"].value == "" )
				{
					 alert( "Please provide isbn!" );
					 return false;
				}

					if( document.forms["addbook"]["author"].value < 0 )
					{
						 alert( "Please provide  author" );
						 return false;
					}

			 }
	   //-->
	</script>
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
	<div><h1 style="color:#400F74;">Add a new book</h1></div>
	<form name="addbook" action="<?php echo base_url(); ?>index.php/library/add_book_result" onsubmit="return validateForm()" method="post">
ISBN:<input type="text" name="ISBN"pattern="[0-9]+"title="this format is not allowed"><br>
BookName: <input type="text" name="BookName" pattern="[A=Za-z\s]{3,20}"title="this format is not allowed"><br>
   BookPrice: <input type="text" name="BookPrice"><br>
   DatePublish: <input type="date" name="DatePublish"><br>
   number of pages: <input type="text" name="number_of_pages"><br>
	 <div>
	 bestofcollections: <br><input type="radio" name="BestOfCollection" value="yes"><p1>Yes</p1>
	<br>
	 <br><input type="radio" name="BestOfCollection" value="no"><p1>no</p1>
</div>
   EditionNumber: <input type="text" name="EditionNumber"><br>
   PrintDate: <input type="date" name="PrintDate"><br>



	<?php

		 echo '<br><br> authors <br>';

		 foreach ($authorslist as $author)
		 {
			 echo '<input type="checkbox" name="author[]" value="'.$author->IdAuthor.'"> '.$author->AuthorName.'<br>';
		 }
     echo '<br><br> Genre <br>';

     foreach ($categorylist as $category)
     {
       echo '<input type="checkbox" name="category[]" value="'.$category->IdCategory.'"> '.$category->CategoryName.'<br>';
     }
     echo '<br> <br> type  <br>';

     foreach ($formatlist as $format)
     {
       echo '<input type="checkbox" name="format[]" value="'.$format->idformat.'"> '.$format->formatname.'<br>';
     }

		  echo'  <input type="submit" value="Submit">
		  </form>';

	?>






</body>
</html>
