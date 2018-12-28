<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Students</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["edit"]["studentName"].value == "" )
	         {
	            alert( "Please provide student name!" );
	            return false;
	         }

	         if( document.forms["edit"]["studentAge"].value == "" )
	         {
	            alert( "Please provide student age!" );
	            return false;
	         }
					 if( document.forms["edit"]["studentAge"].value < 0 )
	         {
	            alert( "Please provide student age greater than 0!" );
	            return false;
	         }

	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Edit Book</h1></div>
	<form name="edit" action="<?php echo base_url(); ?>index.php/library/updatebook" onsubmit="return validateForm()" method="post">
	 Student Name: <input type="text" name="BookName" value="<?php echo $books->BookName?>"><br>
	ISBN: <input type="text" name="ISBN" value="<?php echo $books->ISBN?>"><br>
   BookPrice: <input type="text" name="BookPrice" value="<?php echo $books->BookPrice?>"><br>
   DatePublish: <input type="text" name="DatePublish" value="<?php echo $books->DatePublish?>"><br>
   number_of_pages: <input type="text" name="number_of_pages" value="<?php echo $books->number_of_pages?>"><br>
   BestOfCollection: <input type="text" name="BestOfCollection" value="<?php echo $books->BestOfCollection?>"><br>
   EditionNumber: <input type="text" name="EditionNumber" value="<?php echo $books->EditionNumber?>"><br>
   PrintDate: <input type="text" name="PrintDate" value="<?php echo $books->PrintDate?>"><br>

	<?php


		 echo '<br><br> Authors <br>';

		 foreach ($authorslist as $author)
		 {
			 $isthere = 0;
			 foreach($books_has_author as $selected)
			 {
				 if($author->IdAuthor == $selected->author_IdAuthor)
				 {
					 $isthere = 1;
					 break;
				 }
			 }
			 if($isthere == 1)
			 {
				 echo '<input checked type="checkbox" name="author[]" value="'.$author->IdAuthor.'"> '.$author->AuthorName.'<br>';
			 }
			 else
			 {
				 echo '<input type="checkbox" name="author[]" value="'.$author->IdAuthor.'"> '.$author->AuthorName.'<br>';
			 }
		 }



     echo '<br><br> Genre <br>';

     foreach ($categorylist as $category)
     {
       $isthere = 0;
       foreach($category_has_books as $selected)
       {
         if($category->IdCategory == $selected->category_IdCategory)
         {
           $isthere = 1;
           break;
         }
       }
       if($isthere == 1)
       {
         echo '<input checked type="checkbox" name="category[]" value="'.$category->IdCategory.'"> '.$category->CategoryName.'<br>';
       }
       else
       {
         echo '<input type="checkbox" name="category[]" value="'.$category->IdCategory.'"> '.$category->CategoryName.'<br>';
       }
     }
     echo '<br><br> Type <br>';

     foreach ($formatlist as $format)
     {
       $isthere = 0;
       foreach($format_has_books as $selected)
       {
         if($format->idformat == $selected->format_idformat)
         {
           $isthere = 1;
           break;
         }
       }
       if($isthere == 1)
       {
         echo '<input checked type="checkbox" name="format[]" value="'.$format->idformat.'"> '.$format->formatname.'<br>';
       }
       else
       {
         echo '<input type="checkbox" name="format[]" value="'.$format->idformat.'"> '.$format->formatname.'<br>';
       }
     }


		  echo'    <input type="hidden" name="ID" value="'.$books->ID.'">
			<input type="submit" value="Update">
		  </form>';

	?>






</body>
</html>
