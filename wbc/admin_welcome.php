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

     if(!isset($_SESSION["admin"])){
          header("Location: index.php");

    }

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
            <form name="main_form" action="admin_forms.php"    method="post" class="form-horizontal" enctype="multipart/form-data" >

            <input type="hidden" name="act_logout">
        <button type="submit" style="float:right"> Logout </button>

    </form>

        <br>

        <h5 style="text-align:center">Welcome <?php echo $_SESSION["admin"][2] ?></h5>
			
        <hr>

<form name="main_form" action="admin_filter.php"    method="post" class="form-horizontal" enctype="multipart/form-data" >  

    <input type="hidden" value="all" name="filter">      
    <button type="submit">Filter Past Appointments</button>

</form>

<hr>
        <br>
        <?php 
        
        echo "<h6 style='text-align:center'>Current Appointments</h6><br>";


        if($_SESSION["clients_new"]=="null"){

            echo "No new apponitments are there";

        }
        else{

            $x=0;
            foreach($_SESSION["clients_new"] as $client){
                
                ?>

            <div class="row z-depth-2" style="padding:10px">

			<form name="main_form" action="stu_details.php"    method="post" class="form-horizontal" enctype="multipart/form-data" id="signupForm2" >  

            <input type="hidden" name="id" value="<?php echo $x ?>">
            <input type="hidden" name="from" value="admin_welcome">

            <span><b>CID</b> - <?php echo $client[0]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <span><b>Date</b> - <?php echo $client[18]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <span><b>Time</b> - <?php echo $client[19]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <br>
            <span><b>Personal Concerns shared by client</b> - 
            <?php
                if($client[16] == "None" OR $client[16] == ""){
                    echo "No";
                }
                else echo "Yes";
            ?>           
           </span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <span><b>Academic Concerns shared by client</b> - 
            <?php
                if($client[21] == "None" OR $client[21] == ""){
                    echo "No";
                }
                else echo "Yes";
            ?>           
           </span>&nbsp &nbsp &nbsp &nbsp &nbsp

                <button style="float:right" type="submit">View  Details</button>
                </form>


                <div>
                <br>
                <form name="main_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"    method="post" class="form-horizontal" enctype="multipart/form-data" id="signupForm2" >  

                <input type="hidden" name="act_done">
                <input type="hidden" name="id" value="<?php echo $x ?>">

                <button  type="submit">Session Done</button>

                </form>
                </div>
				</div>

                <?php
                $x=$x+1;
            ?>

                <?php
                

            }
        }




        
        echo "<br><hr><br><h6 style='text-align:center'>Past Appointments</h6><br>";

        if($_SESSION["clients_past"]=="null"){

            echo "No apponitments taken in past";

        }
        
        else{




            $y=0;
            foreach($_SESSION["clients_past"] as $client){
                
                ?>



            <div class="row z-depth-2" style="padding:10px">

			<form name="main_form" action="stu_details_past.php"    method="post" class="form-horizontal" enctype="multipart/form-data" id="signupForm2" >  

            <input type="hidden" name="id" value="<?php echo $y ?>">
            <input type="hidden" name="from" value="admin_welcome">

            <span><b>Client ID</b> - <?php echo $client[0]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <span><b>Date</b> - <?php echo $client[18]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <span><b>Time</b> - <?php echo $client[19]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <br>
            <span><b>Personal Concerns shared by client</b> - 
            <?php
                if($client[16] == "None" OR $client[16] == ""){
                    echo "No";
                }
                else echo "Yes";
            ?>           
           </span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <span><b>Academic Concerns shared by client</b> - 
            <?php
                if($client[21] == "None" OR $client[21] == ""){
                    echo "No";
                }
                else echo "Yes";
            ?>           
           </span>&nbsp &nbsp &nbsp &nbsp &nbsp
            
            <?php
                $y=$y+1;
            ?>

                <button style="float:right" type="submit">View  Details</button>
                </form>


                <div>
                <br>
              
                </div>
				</div>

            
                <?php
                

            }
        }
             ?>
		
    </div>
	</main>
      <footer class="page-footer notprint  center" style="opacity: 0.95;border-color: black;border-style: ridge;border-radius: 10px;margin-top: 20px;background-color: #e0f2f1;clear: both;position: relative;height: 80px;margin-top: -40px;">

    <div class="container">
    <b style="color:black"><i>Copyright © 2019. IIIT-Delhi <br>
     Developed and Designed by: Himanshu Sundriyal&nbsp;and Divyanshu Sundriyal &nbsp;&nbsp; &nbsp;Powered by: Web Admin, IIIT-D </i></b>
    
    </div>
    </footer>  

    <script type="text/javascript" src="assets/js/materialize.js"></script>


  

</body>
</html>