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
	require 'welcome_forms.php';

   $handle = fopen("sample_student_data.csv", "r");
   
   $row = 1;
   $data_all = array();
   $emails = array();

   while (($data = fgetcsv($handle)) !== FALSE) {
        array_push($data_all,$data);
		array_push($emails,$data[0]);
   }

   //print_r($data_all);
   //print_r($emails);
   fclose($handle);

   $len_data = sizeof($emails);
   $given_email = "hsdev@iiitd";
   $index = 0;
   for ($x = 0; $x <= $len_data -1; $x++) {
		if($emails[$x] == $given_email){
			#echo $emails[$x];
			$index = $x;
			break;
		}
	}
	
	//print_r($data_all[$index]);

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
	 <div class="row">
			<div class="col s12 card center" style="background-color: white; opacity: 0.8;margin: auto;margin-bottom: 10px;">
			<h5>CONFIDENTIALITY IS HIGHLY ENSURED *</h5>
		</div>
	</div>

	<main>
		<div class="container form_row center">

				<h6>Your request for appointment has been successfully registered.</h6>


			
		</div>
				<br>
				<a href="stu_all_meetings.php" style="margin-left:auto;margin-right:auto;position: relative;left: 45%" class="col s4 offset-s4center waves-light waves-effect btn">Go to Portal Page</a>



		
	</main>

    
            



    <script type="text/javascript" src="assets/js/materialize.js"></script>
    <script type="text/javascript" src="assets/js/jquery.timepicker.js"></script>

	

</body>
</html>