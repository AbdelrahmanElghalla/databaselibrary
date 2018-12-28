<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Library Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>include/css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo base_url();?>include/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>include/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	   <!--
    	      // Form validation code will come here.
    	      function validateForm()
    	      {
    	         if( document.forms["login"]["UserName"].value == "" )
    	         {
    	            alert( "enter username" );
    	            return false;
    	         }
    	         if( document.forms["login"]["Password"].value == "" )
    	         {
    	            alert( "enter password" );
    	            return false;
    	         }
    	      }
    	   //-->
    	</script>
    <style type="text/css">
        body{
            background: #f0d5bc;
        }
        #loginContent{
            margin-top: 100px;
        }
        #lib_login_logo{
            margin-top: -80px;

        }
        #loginForm{
            background: #dc9d62;
            border-radius: 30px;
        }
        #navs{
            background: #dc9d62 !important;
            margin-bottom: 0px;
            border: 1px solid transparent;
        }
        #sideLine{
            width: 80% !important;
            margin-left: 10%;
        }
        #btnAsdAsd{
            margin-left: 10%;
        }
        #submitBtn{
            background: #f0d5bc;
            border-radius: 10px;
            border: 2px solid #dc9d62;

        }
    </style>
</head>
<body>
<nav class="navbar navbar-default" data-spy="affix" data-offset-top="197" id="navs">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo base_url();?>" class="navbar-brand">E-Library</a>
        </div>
        <div class="collapse navbar-collapse" id="navBar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Help!"></span></a></li>

            </ul>
        </div>
    </div>
</nav>

<div class="col-md-6 col-md-offset-3" id="loginContent">

    <div class="well" id="loginForm">
        <center><img src="<?php echo base_url();?>images/modal1.png" height="120px" width="120px" id="lib_login_logo"></center>
        <form name="login" action="<?php echo base_url();?>index.php/library/loginrequest" onsubmit="return validateForm()" method="POST">
            <h2 class="text-center">admin Login</h2>




            <?php
                if($this->session->flashdata('error')){
                    echo '<div id="sideLine" class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Error! </strong>'.$this->session->flashdata('error').' </div>';
                }

            ?>

            <?php
                if($this->session->flashdata('pass')){
                    echo '<div id="sideLine" class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Error! </strong>'.$this->session->flashdata('pass').' </div>';
                }

            ?>
            <div id="sideLine" class="form-group">
                <label for="UserName">Username</label>
                <input type="text" name="UserName" id="UserName" class="form-control input-lg" id="input_form">
            </div>
            <div id="sideLine" class="form-group">
                <label for="Password">Password</label>
                <input type="Password" name="Password" id="Password" class="form-control input-lg" id="input_form">
            </div>
            <div id="btnAsdAsd" class="form-group">
                <input type="submit" value="Login" class="btn btn-default btn-lg" id="submitBtn">
            </div>
        </form>
    </div>
</div>
</body>
</html>
