<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?>
<!DOCTYPE html>
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
<div><h1>authors</h1></div>
<div class="divTable">
<div class="divTableHeading">
<div class="divTableRow">
<div class="divTableHead">Author Name</div>



</div>
</div>
<div class="divTableBody">

      <?php
			foreach ($author as $author) {

				echo '<div class="divTableRow">';
				echo '<div class="divTableCell">'.$author->AuthorName.'</div>';

				echo '</div>';
			}
			?>
		</div>
</div>

</body>
</html>
