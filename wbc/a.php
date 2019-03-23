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
        .title{
            color: black;
            font-size: 20px;
            text-align:center;

        }
        .title1{
            color: black;
            font-size: 20px;

        }
        hr.style-eight {
    overflow: visible; /* For IE */
    padding: 0;
    border: none;
    border-top: medium double #333;
    color: #333;
    text-align: center;
}
hr.style-eight:after {
    content: "§";
    display: inline-block;
    position: relative;
    top: -0.7em;
    font-size: 1.5em;
    padding: 0 0.25em;
    background: white;
}
.box{
    padding:10px
}
@media print{
  @page {
    size: auto;   /* auto is the initial value */
    size: A4 portrait;
    margin: 0;  /* this affects the margin in the printer settings */
    border: 1px solid red;  /* set a border for all printed pages */
  }
}
	</style>

</head>

<?php
    session_start();
    
    
    $id=$_POST["id"];

        $from=$_POST["from"];

    if($from=="admin_welcome"){
        $client=$_SESSION["clients_past"][$id];
        }
        else{
            $client=$_SESSION["meetings_past"][$id];
    
        }
    
    $_SESSION["current_stu"]=$client;
    
?> 

	
	<header class="header col s12 header_row">
      <div class="row">
	  

      <div style="max-width:75%!important;height: 10vh" class="center hide-on-small-only">
            <div id="site-logo">
              <a href=""title="Home"><img src="https://www.iiitd.ac.in/sites/all/themes/impact_theme/logo.png" alt="Home"></a>
            </div>

      </div>

	 </header>

    <main>
        <div class="row" style="height:80vh;width:100%">
            <div class="col s12 m2 l2" style="height:80vh;text-size:10">
            <span>Roll Number</span><input  name="roll" placeholder="Roll Number" id="roll_no" type="text" class="validate" value="<?php echo $client[1] ?>">

                
            </div>
            <div class="col s12 m10 l10 red" style="height:80vh">
            
            </div>
        </div>
    </main> 

	<main>

    
<button style="float:right; margin-right:100px" onclick="myFunction()">Print this page</button>



		
        <?php 
        ?>
            <div class="row z-depth-2" style="padding:10px; margin-right:100px;margin-left:100px">


        
            <div class="title1"><b>Meeting Details</b></div>

            
            <br>

            <span><b>CID</b> - <?php echo $client[0]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp

            <span><b>Counsellor</b> - <?php echo $client[17]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp

<br>
            <span><b>Date</b> - <?php echo $client[18]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp

            <span><b>Time</b> - <?php echo $client[19]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp

            <br>
            <hr>
            <br>
            
        


            </div>
            <div class="row">
				    <div class="row">
                  
						<div class="input-field col l4 m6 s12">
                        <label for="roll_no">Roll Number</label>
                        <br>
						<!-- <i class="material-icons prefix">book</i> -->

						<input readonly name="roll" id="roll_no" type="text" class="validate" value="<?php echo $client[1] ?>">
						</div>
						<div class="input-field col l4 m6 s12">
                        <label for="name">Name</label>
                        <br>
						<!-- <i class="material-icons prefix">person</i> -->
						<input  readonly name="name" id="name" type="text" class="validate" value="<?php echo $client[2] ?>">
						</div>
						<div class="input-field col l4 m6 s12">
                        <label for="age">Age</label>
                        <br>
						<!-- <i class="material-icons prefix">cake</i> -->
						<input readonly name="age" id="age" type="text" class="validate" value="<?php echo $client[3] ?>">
						</div>
					</div>
                    
					<div class="row">
						<div class="input-field col l4 m6 s12">
						<!-- <i class="material-icons prefix">account_circle</i> -->
                        <label for="gender">Gender</label>
                        <br>
						<input readonly name="gender" id="gender" type="text" class="validate" value="<?php echo $client[4] ?>">
						</div>
						<div class="input-field col l4 m6 s12">
                        <label for="program" >Program</label>
                        <br>
						<!-- <i class="material-icons prefix">domain</i> -->
						<input readonly lect name="program" value="<?php echo $client[5] ?>">
						  
						</div>
						<div class="input-field col l4 m6 s12">
                        <label for="branch">Branch</label>
                        <br>
						<!-- <i class="material-icons prefix">domain</i> -->
						
                        <input readonly lect name="branch" value="<?php echo $client[6] ?>">

						</div>
					</div>

					<div class="input-field col l4 m6 s12">
                    <label>Current Semester</label>
                    <br>

                    <input readonly type="text" value="<?php echo $client[7] ?>" name="sem">

					<!-- <i class="material-icons prefix">flash_on</i> -->
					
					</div>
					<div class="input-field col l4 m6 s12">
					<!-- <i class="material-icons prefix">mail</i> -->
                    <label for="email">IIIT-D Email ID</label>
                    <br>
					<input readonly name="email" id="email" type="email" class="validate" value="<?php echo $client[8] ?>">

					</div>
					<div class="input-field col l4 m6 s12">
					<!-- <i class="material-icons prefix">mail</i> -->
                    <label for="alt_email">Alternate Email ID</label>
                    <br>
					<input readonly name="aemail" id="alt_email" type="email" class="validate" value="<?php echo $client[9] ?>">

					</div>
					<div class="input-field col l4 m6 s12">
					<!-- <i class="material-icons prefix">phone</i> -->
                    <label for="contact">Contact Number</label>
                    <br>
					<input  readonly name="contact" id="contact" type="text" class="validate" value="<?php echo $client[10] ?>">
					</div>
					<div class="input-field col l4 m6 s12">
					<!-- <i class="material-icons prefix">phone</i> -->
                    <label for="alt_contact">Alternate Contact Number</label>
                    <br>
					<input readonly name="acontact" id="alt_contact" type="text" class="validate" value="<?php echo $client[11] ?>">
					</div>
					<div class="input-field col l4 m6 s12">
					<!-- <i class="material-icons prefix">hotel</i> -->
                    <label>Hosteller/Day Scholar</label>
                    <br>

                    <input readonly lect name="accom" value="<?php echo $client[12] ?>">

					</div>
			</div>

<hr>
            <span class="title"><b>Major Concern</b></span>
            <br>
            
            <i>
            <?php echo $client[16]."      "  ?></i>

            <br><br>
            <br>
            <hr class="style-eight">
            
            <br>

            <div class="title">Main Problems</div>
            <br>

            <textarea  class="box" id="text-box-1" rows="100" cols="50">
            </textarea>
            <br>
            <br>

            <div class="title">Triggers</div>
            <br>
            <textarea class="box" id="text-box-2" rows="100" cols="50">
            </textarea>
            <br>
            <br>


            <div class="title">Current Coping Strategies</div>
            <br>

            <textarea class="box" id="text-box-3" rows="100" cols="50">
            </textarea>
            <br>
            <br>

            <div class="title">Session Notes</div>
            <br>

            <textarea class="box" id="text-box-4" rows="100" cols="50">
            </textarea>



    </div>
	</main>
  
    <script>
function myFunction() {
  window.print();
}
</script>



<script>


document.getElementById('text-box-1').style.height="150px";

document.getElementById('text-box-2').style.height="150px";

document.getElementById('text-box-3').style.height="150px";

document.getElementById('text-box-4').style.height="150px";

</script>

</body>
</html>