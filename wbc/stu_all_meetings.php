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


    require 'stu_all_meetings_forms.php';
    

?> 

<body class="bg-dark" style="background: url('images/purple_green.png') no-repeat center center fixed; background-size: 100% 100%; height: 100%;">
	
	<header  class="header col s12 header_row">
      <div class="row">
	  

      <div style="max-width:75%!important;height: 10vh" class="center hide-on-small-only">
            <div id="site-logo">
              <a href=""title="Home"><img src="https://www.iiitd.ac.in/sites/all/themes/impact_theme/logo.png" alt="Home"></a>
            </div>

      </div>

      
	 </header>

	<main>
		<div class="container form_row">
			
        <hr>
        <div style="text-align: center;">

        <?php 
        echo "Client ID : ".$_SESSION['cid'];  
        echo "<br>Email ID : ".$_SESSION['email'];  

        ?>
        <br>
        <br>
        <a style="color:black" href="welcome.php"><button class="waves-effect waves-light btn">
            <i class="material-icons left">today</i>Take New Appointment</button></a>

</div>
        <br>
        <?php 
        
        echo "<h6 style='text-align:center'>Current Appointments</h6><br>";


        if($_SESSION["meetings_new"]=="null"){

            echo "<p class='center card'>You do not have any pending appointment.</p>";

        }
        else{

            $x=0;
            foreach($_SESSION["meetings_new"] as $client){
                
                ?>

            <div class="row z-depth-2" style="padding:10px">

			<form name="main_form" action="stu_details.php"    method="post" class="form-horizontal" enctype="multipart/form-data" id="signupForm2" >  

            <input type="hidden" name="id" value="<?php echo $x ?>">
						<input type="hidden" name="from" value="stu_all_meatings">

            <span><b>Psychologist</b> - <?php echo $client[17]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <a class="waves-effect waves-light btn remind_button"  style="float: right;">
                <i class="material-icons left">notifications</i>Give Reminder</a>
            <br>
            <span><b>Date</b> - <?php echo $client[18]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
            <span><b>Time</b> - <?php echo $client[19]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp


<!--                 <button class="hide" style="float:right" type="submit">View  Details</button>
 -->                
            </form>


                <div>
                <form name="main_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"    method="post" class="form-horizontal" enctype="multipart/form-data" id="signupForm2" >  

                <input type="hidden" name="act_done">
                <input type="hidden" name="id" value="<?php echo $x ?>">


                </form>
                </div>
				</div>

                                 <?php
                            $x=$x+1;
                        

                        }
                    }



                echo "<div class='hide'>";

                    
                    echo "<br><hr><br><h6 style='text-align:center'>Past Appointments</h6><br>";

                    if($_SESSION["meetings_past"]=="null"){

                        echo "No apponitments taken in past";

                    }
                    
                    else{

                        $y=0;
                        foreach($_SESSION["meetings_past"] as $client){
                            
                            ?>

                        <div class="row z-depth-2" style="padding:10px">

                        <form name="main_form" action="stu_details_past.php"    method="post" class="form-horizontal" enctype="multipart/form-data" id="signupForm2" >  

                        <input type="hidden" name="id" value="<?php echo $y ?>">
                                    <input type="hidden" name="from" value="stu_all_meatings">

                        <span><b>CID</b> - <?php echo $client[0]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
                        <span><b>Roll Number</b> - <?php echo $client[1]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
                        
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

               
		
    </div>
    <div class=" container form_row"  style="background-color: #e0f2f1">
        <h6 class="center">Important Note</h6>
        <h7 class="center">Once requested a Psychologist for an appointment, you can send reminder using "Send Reminder" button.</h7>  
    </div>
	</main>
<br>
<br>
<br>

      <footer class="page-footer notprint  center" style="opacity: 1;border-color: black;border-style: ridge;border-radius: 10px;margin-top: 20px;background-color: #fff;width: 100%;">

    <div class="container">
    <b style="color:black"><i>Copyright © 2019. IIIT-Delhi <br>
     Developed and Designed by: Himanshu Sundriyal&nbsp;and Divyanshu Sundriyal &nbsp;&nbsp; &nbsp;Powered by: Web Admin, IIIT-D </i></b>
    
    </div>
    </footer>  



    <script type="text/javascript" src="assets/js/materialize.js"></script>
    <script type="text/javascript">
         $('a.remind_button').click(function() {
            alert("A reminder has been sent to respective Psychologist");
            });
    </script>

  

</body>
</html>