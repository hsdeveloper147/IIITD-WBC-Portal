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


    if(isset($_POST["filter"])){
    $filter_type=$_POST["filter"];

    $_SESSION["filter_type"]=$filter_type;



}
else{
    $filter_type=$_SESSION["filter_type"];
}


    $filtered=$_SESSION["clients_past"];
   

?> 

<body class="bg-dark" style="background: url('images/purple_green.png') no-repeat center center fixed; background-size: 100% 100%; height: 100%;">
	
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
        <button  class="waves-effect waves-light btn" type="submit" style="float:right"> Logout </button>

<br>
<br>
    </form>


<form  action="admin_filter.php"  method="post" class="form-horizontal" enctype="multipart/form-data" >

     <input type="hidden" name="filter" value="all">
    <button class="waves-effect waves-light btn"  type="submit" style="float:left" >Show All Issues</button>

</form>


<form  action="admin_filter.php"  method="post" class="form-horizontal" enctype="multipart/form-data" >

     <input type="hidden" name="filter" value="acad">
    <button class="waves-effect waves-light btn"  type="submit"  style="float:left;margin-left:10px" > Filter By Academic Issues </button> 

</form>


<form  action="admin_filter.php"  method="post" class="form-horizontal" enctype="multipart/form-data" >

     <input type="hidden" name="filter" value="personal">

    <button class="waves-effect waves-light btn"  type="submit" style="float:left;margin-left:10px"> Filter By Personal Issues </button>

</form>

<br>
<br>
     <hr>
     <br>

        <?php 

        if($filter_type=="all"){
       
            echo "<h5>Showing All Past Appointments</h5><br>";

            $y=0;
            foreach($filtered as $client){
                
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

                <button  style="float:right" type="submit">View  Details</button>
                </form>


                <div>
                <br>
              
                </div>
				</div>

            
                <?php
                

            
        }

    }
    else if($filter_type=="acad"){
       
            echo "<h5>Showing  Past Appointments Related To Academics Issues</h5><br>";

            $y=0;
            foreach($filtered as $client){

             if($client[21] == "None" OR $client[21] == ""){

         }
            else{
                
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

                <button class="waves-effect waves-light btn" style="float:right" type="submit">View  Details</button>
                </form>


                <div>
                <br>
              
                </div>
                </div>

            
                <?php
                
}
            
        }

    }

     else if($filter_type=="personal"){
       
            echo "<h5>Showing  Past Appointments Related To Personal Issues</h5><br>";

            $y=0;
            foreach($filtered as $client){
                
                 if($client[16] == "None" OR $client[16] == ""){
                    echo "No";
                }
                else {

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

                <button class="waves-effect waves-light btn" style="float:right" type="submit">View  Details</button>
                </form>


                <div>
                <br>
              
                </div>
                </div>

            
                <?php
                
}
            
        }

    }
             ?>
		
    </div>
	</main>
    <br>
    <br>

      <footer class="page-footer notprint  center" style="opacity: 1;border-color: black;border-style: ridge;border-radius: 10px;margin-top: 20px;background-color: #fff;clear: both;position: relative;height: 80px;margin-top: -40px;">

    <div class="container">
    <b style="color:black"><i>Copyright © 2019. IIIT-Delhi <br>
     Developed and Designed by: Himanshu Sundriyal&nbsp;and Divyanshu Sundriyal &nbsp;&nbsp; &nbsp;Powered by: Web Admin, IIIT-D </i></b>
    
    </div>
    </footer>  


</body>
</html>