<!DOCTYPE html>

<html>
<head>
	<title>Welcome</title>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 


		<link rel="shortcut icon" href="favicon.ico">

		<link rel="stylesheet" href="assets/css/normalize.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/themify-icons.css">
		<link rel="stylesheet" href="assets/css/flag-icon.min.css">
		<link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
		<link rel="stylesheet" href="assets/css/jquery.timepicker.css">
	
	<style>
		.header_row {
			background-color : white;
			opacity: 0.9;
			padding-bottom: 1vh;
			margin-bottom: 4vh;
 		}
		.form_row {
			padding: 1vh;
			background-color : white;
			opacity: 0.95;
		}
		.dropdown-content li > span {
           font-size: 10px;
        }

		         body {
		    display: flex;
		    min-height: 100vh;
		    flex-direction: column;
		  }

		  main {
		    flex: 1 0 auto;
		  }
	</style>

</head>

<?php 

 session_start();

    

?>

<body class="bg-dark" style="background: url('images/purple_green.png') no-repeat center center fixed; background-size: 100% 100%; height: 100%;">
	
	<header class="header col s12 header_row">
      <div class="row">
	  <a  href="logout.php" style="float:right;margin:20px;" class="btn tooltipped right" style="position:relative;top:10px;right:15px;z-index:6" data-position="bottom" data-tooltip="Click to Logout">
              Logout<span><i class="material-icons">exit_to_app</i></span>
      </a>
      <div style="max-width:75%!important;height: 80px" class="center hide-on-small-only">
            <div id="site-logo">
              <a href=""title="Home"><img src="https://www.iiitd.ac.in/sites/all/themes/impact_theme/logo.png" alt="Home"></a>
            </div>

      </div>

	 </header>
	
	<main>
		<div class="container form_row center">

			<h5> Book A Walk-In Appointment</h5>
			<hr>
			<br>
			<br>
<form  action="walk_in_forms.php"  method="post" class="form-horizontal" enctype="multipart/form-data" >

			<span> Enter Email of Client</span>

			<input type="text" name="walk_email">
<br>
			 <button class="waves-effect waves-light btn" type="submit" style="float:left;margin-left:10px" >Submit</button>

<br>
<br>
<br>
</form>

		</div>
		
	</main>

    
            



    <script type="text/javascript" src="assets/js/materialize.js"></script>
         <script type="text/javascript" src="assets/js/jquery.timepicker.js"></script>

	

</body>
</html>