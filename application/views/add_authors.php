<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>library</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["addauthor"]["AuthorName"].value == "" )
	         {
	            alert( "Please provide author name!" );
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

  <?php
	if(isset($result))
	{
		echo '<p  style="font-size: 2vw;" class="m-3">Author added successfully</p>';

	}
	else {
		echo '<form name="addauthor" action="'. base_url().'index.php/library/add_authors" onsubmit="return validateForm()" method="post">

<div><h1>add author</h1></div>
		 Author Name:<input type="text" name="AuthorName"><br><br>';

     echo '<input type="submit" value="Submit" >
    		  </form>';

	}
	?>




</body>
</html>
