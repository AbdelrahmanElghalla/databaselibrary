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

<div><h1>All books</h1></div>
<div class="divTable">
<div class="divTableHeading">
<div class="divTableRow">
<div class="divTableHead">book Name</div>
<div class="divTableHead">ISBN </div>
<div class="divTableHead">Book Price </div>
<div class="divTableHead">DatePublish </div>
<div class="divTableHead">BestOfCollection</div>
<div class="divTableHead">number_of_pages</div>
<div class="divTableHead">EditionNumber</div>
<div class="divTableHead">PrintDate</div>
<div class="divTableHead">Authors</div>
<div class="divTableHead">Genre</div>
<div class="divTableHead">Type</div>
<div class="divTableHead">Edit</div>
<div class="divTableHead">Delete</div>



</div>
</div>
<div class="divTableBody">

      <?php
			foreach ($book as $book) {

				echo '<div class="divTableRow">';
				echo '<div class="divTableCell">'.$book->BookName.'</div>';
				echo '<div class="divTableCell">'.$book->ISBN.'</div>';
				echo '<div class="divTableCell">'.$book->BookPrice.'</div>';
				echo '<div class="divTableCell">'.$book->DatePublish.'</div>';
        echo '<div class="divTableCell">'.$book->BestOfCollection.'</div>';
        echo '<div class="divTableCell">'.$book->number_of_pages.'</div>';
        echo '<div class="divTableCell">'.$book->EditionNumber.'</div>';
        echo '<div class="divTableCell">'.$book->PrintDate.'</div>';
        echo '<div class="divTableCell">'.$bookauthors->BooksAuthors.'</div>';
        echo '<div class="divTableCell">'.$bookcategory->bookscategory.'</div>';
        echo '<div class="divTableCell">'.$bookformats->BooksFormat.'</div>';
        echo '<div class="divTableCell"><a href="'. base_url().'index.php/library/editbook/'.$book->ID.'">edit</a></div>';
echo '<div class="divTableCell"><a href="'. base_url().'index.php/library/delete_book/'.$book->ID.'">Delete</a></div>';

				echo '</div>';
			}
			?>
		</div>
</div>

</body>
</html>
