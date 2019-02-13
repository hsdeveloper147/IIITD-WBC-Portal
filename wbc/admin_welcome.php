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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>



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
	</style>

</head>

<?php
    session_start();
    require 'admin_forms.php';
    


?> 

<body class="bg-dark" style="background: url('hands.jpg') no-repeat center center fixed; background-size: 100% 100%; height: 100%;">
	
	<header class="header col s12 header_row">
      <div class="row">
	  

      <div style="max-width:75%!important;height: 10vh" class="center hide-on-small-only">
            <div id="site-logo">
              <a href=""title="Home"><img src="https://www.iiitd.ac.in/sites/all/themes/impact_theme/logo.png" alt="Home"></a>
            </div>

      </div>

	 </header>

	<main>
		<div class="container form_row">
        <h5 style="text-align:center">Welcome <?php echo $_SESSION["admin"][2] ?></h5>
			
        <hr>
        <br>
        <?php 
        
        if($_SESSION["clients"]=="null"){

            echo "No apponitments are there";

        }
        else{


            foreach($_SESSION["clients"] as $client){
                
                ?>

            <div class="row z-depth-2" style="padding:5px">

            <b>Student Details</b>
            <br>
            <span><b>CID</b> - <?php echo $client[0]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <span><b>Roll Number</b> - <?php echo $client[1]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <span><b>Name </b>- <?php echo $client[2]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp

            <hr>
            <!-- <span><b>Age </b>- <?php echo $client[3]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp

            <span><b>Email</b> - <?php echo $client[4]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <span><b>Contact Number</b> - <?php echo $client[5]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <br> -->

            <b>Meeting Details</b>
            <br>

            <span><b>Counsellor </b>- <?php echo $client[17]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp

            <span><b>Date</b> - <?php echo $client[18]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <span><b>Time</b> - <?php echo $client[19]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <hr>

            <b>Major Concern</b>
            <br>
            <i>
            <?php echo $client[16]."      "  ?></i>
            <hr>

				</div>

                


                <?php
                

            }
        }
             ?>
		
    </div>
	</main>



  

</body>
</html>