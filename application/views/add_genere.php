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

	         if( document.forms["addcategory"]["CategoryName"].value == "" )
	         {
	            alert( "Please provide genre name!" );
	            return false;
	         }



	      }
	   //-->
	</script>
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
	<div><h1>add genre</h1></div>

  <?php
	if(isset($result))
	{
		echo '<p  style="font-size: 2vw;" class="m-3">genere added successfully</p>';

	}
	else {
		echo '<form name="add" action="'. base_url().'index.php/library/add_genere"onsubmit="return validateForm()" method="post">

		 Genre Name:<input type="text" name="CategoryName"><br><br>';

     echo '<input type="submit" value="add" >
    		  </form>';

	}
	?>




</body>
</html>
