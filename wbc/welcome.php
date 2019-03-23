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
    if(!isset($_SESSION["email"])){
		  header("Location: index.php");

	}
    // echo $_SESSION['email'];
	require 'welcome_forms.php';


   $handle = fopen("sample_student_data.csv", "r");
   
   $row = 1;
   $data_all = array();
   $emails = array();

   // $given_email = "hsdev@iiitd";
      $given_email = $_SESSION["email"];



   while (($data = fgetcsv($handle)) !== FALSE) {
        array_push($data_all,$data);
		array_push($emails,$data[0]);
   }

   //print_r($data_all);
   //print_r($emails);
   fclose($handle);

   $len_data = sizeof($emails);
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

<body class="bg-dark" style="background: url('hands.jpg') no-repeat center center fixed; background-size: 100% 100%; height: 100%;">
	
	<header class="header col s12 header_row">
      <div class="row">
	  <a  href="logout.php" style="float:right;margin:20px;" class="btn tooltipped right" style="position:relative;top:10px;right:15px;z-index:6" data-position="bottom" data-tooltip="Click to Logout">
              Logout<span><i class="material-icons">exit_to_app</i></span>
      </a>
      <div style="max-width:75%!important;height: 10vh" class="center hide-on-small-only">
            <div id="site-logo">
              <a href=""title="Home"><img src="https://www.iiitd.ac.in/sites/all/themes/impact_theme/logo.png" alt="Home"></a>
            </div>

      </div>

	 </header>

	<main>
		<div class="row"  style="background-color: #eef2f1">
			<div class="col s12 card center" style="background-color: white; opacity: 0.8;margin: auto;margin-bottom: 10px;">
			<h6>CONFIDENTIALITY IS HIGHLY ENSURED *</h6>
		</div>
			
		</div>
		
		<div class="container form_row" style="background-color: #eef2f1">
			<div class="row z-depth-2">
			<form name="main_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"    method="post" class="form-horizontal" enctype="multipart/form-data" id="signupForm2" >  
				    <div class="row" style="padding:10px">
						<div class="input-field col l4 m6 s12">
						<i class="material-icons prefix">book</i>
						<input name="roll" id="roll_no" type="text" class="validate" value="<?php echo $data_all[$index][1] ?>">
						<label for="roll_no">Roll Number</label>
						</div>
						<div class="input-field col l4 m6 s12">
						<i class="material-icons prefix">person</i>
						<input  name="name" id="name" type="text" class="validate" value="<?php echo $data_all[$index][2] ?>">
						<label for="name">Name</label>
						</div>
						<div class="input-field col l4 m6 s12 hide">
						<i class="material-icons prefix">cake</i>
						<input  name="age" id="age" type="text" class="validate" value="<?php echo $data_all[$index][3] ?>">
						<label for="age">Age</label>
						</div>
						<div class="input-field col l4 m6 s12">
							<i class="material-icons prefix">mail</i>
							<input  name="email" id="email" type="email" class="validate" value="<?php echo $data_all[$index][0] ?>">
							<label for="email">IIIT-D Email ID</label>
							<span class="helper-text" data-error="Wrong Email Format">

						</div>
					</div>
					<div class="row hide">
						<div class="input-field col l4 m6 s12">
						<i class="material-icons prefix">account_circle</i>
						<input  name="gender" id="gender" type="text" class="validate" value="<?php echo $data_all[$index][4] ?>">
						<label for="gender">Gender</label>
						</div>
						<div class="input-field col l4 m6 s12">
						<i class="material-icons prefix">domain</i>
						<select name="program">
						  <option value="" disabled selected>Choose Program</option>
						  <option value="btech"  <?php if($data_all[$index][5]=="B.Tech") echo 'selected="selected"'; ?>>B.Tech</option>
						  <option value="mtech"  <?php if($data_all[$index][5]=="M.Tech") echo 'selected="selected"'; ?>>M.Tech</option>
						  <option value="phd" <?php if($data_all[$index][5]=="PhD") echo 'selected="selected"'; ?>>PhD</option>

						</select>
						<label for="program">Program</label>
						</div>
						<div class="input-field col l4 m6 s12">
						<i class="material-icons prefix">domain</i>
						<select name="branch">
						  <option value="" disabled selected>Choose Branch</option>
						  <option value="cse" <?php if($data_all[$index][6]=="CSE") echo 'selected="selected"'; ?>>CSE</option>
						  <option value="ece" <?php if($data_all[$index][6]=="ECE") echo 'selected="selected"'; ?>>ECE</option>
						  <option value="csam" <?php if($data_all[$index][6]=="CSAM") echo 'selected="selected"'; ?>>CSAM</option>
						  <option value="cb" <?php if($data_all[$index][6]=="CB") echo 'selected="selected"'; ?>>CB</option>

						</select>
						<label for="branch">Branch</label>
						</div>
					</div>
					<div class="input-field col l4 m6 s12 hide">
					<i class="material-icons prefix">flash_on</i>
					<select name="sem">
					  <option value="" disabled selected>Choose Current Semester</option>
					  <option value="1" <?php if($data_all[$index][7]=="1") echo 'selected="selected"'; ?>>Semester 1</option>
					  <option value="2" <?php if($data_all[$index][7]=="2") echo 'selected="selected"'; ?>>Semester 2</option>
					  <option value="3" <?php if($data_all[$index][7]=="3") echo 'selected="selected"'; ?>>Semester 3</option>
					  <option value="4" <?php if($data_all[$index][7]=="4") echo 'selected="selected"'; ?>>Semester 4</option>
					  <option value="5" <?php if($data_all[$index][7]=="5") echo 'selected="selected"'; ?>>Semester 5</option>
					  <option value="6" <?php if($data_all[$index][7]=="6") echo 'selected="selected"'; ?>>Semester 6</option>
					  <option value="7" <?php if($data_all[$index][7]=="7") echo 'selected="selected"'; ?>>Semester 7</option>
					  <option value="8" <?php if($data_all[$index][7]=="8") echo 'selected="selected"'; ?>>Semester 8</option>

					</select>
					<label>Current Semester</label>
					</div>

					<div class="input-field col l4 m6 s12">
					<i class="material-icons prefix">phone</i>
					<input name="contact" id="contact" type="text" class="validate" value="<?php echo $data_all[$index][9] ?>">
					<label for="contact">Contact Number</label>
					</div>
					<!-- <div class="input-field col l4 m6 s12">
					<i class="material-icons prefix">mail</i>
					<input  name="email" id="email" type="email" class="validate" value="<?php echo $data_all[$index][0] ?>">
					<label for="email">IIIT-D Email ID</label>
					<span class="helper-text" data-error="Wrong Email Format">Helper text

					</div> -->
					<div class="input-field col l4 m6 s12">
					<i class="material-icons prefix">mail</i>
					<input name="aemail" id="alt_email" type="email" class="validate" value="<?php echo $data_all[$index][8] ?>">
					<label for="alt_email">Alternate Email ID</label>
					<span class="helper-text" data-error="Wrong Email format">
					</div>
				
					<div class="input-field col l4 m6 s12">
					<i class="material-icons prefix">phone</i>
					<input name="acontact" id="alt_contact" type="text" class="validate" value="<?php echo $data_all[$index][10] ?>">
					<label for="alt_contact">Alternate Contact Number</label>
					</div>
					<div class="input-field col l4 m6 s12 hide">
					<i class="material-icons prefix">hotel</i>
					<select name="accom">
					  <option value="" disabled selected>Hosteller/Day Scholar</option>
					  <option value="Hosteller" <?php if($data_all[$index][11]=="Hosteller") echo 'selected="selected"'; ?>>Hosteller</option>
					  <option value="Day Scholar" <?php if($data_all[$index][11]=="Day Scholar") echo 'selected="selected"'; ?>>Day Scholar</option>
					</select>
					<label>Hosteller/Day Scholar</label>
					</div>
			</div>
			  

			<div class="row z-depth-4">
				<div class="row">
				<div class="input-field col s12 l3 m3" style="font-size:14px;">
					<p><b><span>Have you ever been to a Psychiatrist/Psychologist</b><span>
					<!--select class="dropdown-content" required onchange="change(this);">
					  <option value="" disabled selected>Choose Option</option>
					  <option value="Yes">Yes</option>
					  <option value="No">No</option>
					</select></p>-->

						<div class="switch" id="switcher">
						<label>
						  No
						  <input type="checkbox" name="switcher">
						  <span class="lever"></span>
						  Yes
						</label>
					   </div>

					
				</div>
				<div class="col s12 l8 m8" id="whenandwhy">
						<div class="input-field col s12 m7 l7">
						<input name="past_when" id="when" type="text" class="validate" disabled>
						<label for="when">When</label>
						<div id="result4" style="font-size:14px;margin:0px;padding:4px"></div>

						</div>

						<div class="input-field col s12 m5 l5">
						<input name="past_no_of_sess" id="noss" type="number" class="validate" disabled>
						<label for="noss">Number Of Sessions</label>
						</div>

						<div class="input-field col s12">
						<input name="past_why" id="why" type="text" class="validate" disabled>
						<label for="why">Why</label>
						<div id="result3" style="font-size:14px;margin:0px;padding:0px">

						</div>

				</div>
				</div>
				<div class="row">
                    <div class="input-field col l8 offset-l2 s12 ">
                    <h5 class="center">Personal Concerns To Be Discussed </h5>

                    <div class="input-field col s12 l6 m6" style="font-size:14px;">

					<p><b><span>Want to enter Personal Concerns ?</b><span>
					<!--select class="dropdown-content" required onchange="change(this);">
					  <option value="" disabled selected>Choose Option</option>
					  <option value="Yes">Yes</option>
					  <option value="No">No</option>
					</select></p>-->

						<div class="switch" id="switcher_pc">
						<label>
						  No
						  <input type="checkbox" name="switcher_pc">
						  <span class="lever"></span>
						  Yes
						</label>
					   </div>

					
					</div>
                      <textarea name="maj_concern" id="concerns" name="concerns" required  placeholder="Enter Personal Concerns to be discussed" data-length="10" class="materialize-textarea" disabled></textarea>
					  <div id="result1" style="font-size:14px;margin:0px;padding:0px">
					  Words: 0 &nbsp; &nbsp;Words Left: 100
					  </div>   
                      </div>
                 </div>
                 <div class="row">
                    <div class="input-field col l8 offset-l2 s12 ">

					  <h5 class="center">Academic Concerns To Be Discussed </h5>
					 <div class="input-field col s12 l6 m6" style="font-size:14px;">
					<p><b><span>Want to enter Academic Concerns ?</b><span>
					<!--select class="dropdown-content" required onchange="change(this);">
					  <option value="" disabled selected>Choose Option</option>
					  <option value="Yes">Yes</option>
					  <option value="No">No</option>
					</select></p>-->

						<div class="switch" id="switcher_ac">
						<label>
						  No
						  <input type="checkbox" name="switcher_ac">
						  <span class="lever"></span>
						  Yes
						</label>
					   </div>

					
					</div>
                      <textarea name="maj_concern2" id="maj_concern2" name="maj_concern2" required  placeholder="Enter Academic Concerns to be discussed" data-length="10" class="materialize-textarea" disabled></textarea>
					  <div id="result2" style="font-size:14px;margin:0px;padding:0px">
					  Words: 0 &nbsp; &nbsp;Words Left: 100
					  </div>   
                      </div>
                 </div>

				 <div>
				 <div class="row" style="padding:10px;">
				 	<h5 class="center">Well Being Cell Team</h5>

					<div class="col s12 m4 l4 center card" style=" padding-bottom: 8px;">
						<img src="images/khuspinder.jpg" style="margin:10px;" width="100px" height="120px;">
						<p><b>Khushpinder P. Sharma<br>Counselling Psychologist<br><br></b></p>
						<p><b>Availability:</b>Monday to Friday<br><br>
						   <b>Room No:</b> A-206, Academic block<br>
						   <b>Email:</b> khushpinder@iiitd.ac.in<br>
						   <b>Contact Number:</b> <br>011-26907484,<br> +91 - 9815181252 <br>
						   
						</p>
						
<!-- 					  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">More Details</a>
 -->
					  <div id="modal1" class="modal">
						<div class="modal-content">
						  <h5>Khushpinder P. Sharma</h5><h6>Counselling Psychologist</h6>
						  <img src="images/khuspinder.jpg" class="center">

						  <p>Besides being a Counseling Psychologist with diverse clientele ranging across all age groups, he has also 
						  partaken and conducted a multitude of Counseling Workshops.<br><br>With tremendous experience in counseling to his name 
						  since 2008, his contributions to human betterment, as the former Counseling Psychologist at Lovely Professional 
						  University,Punjab, Counseling Supervisor at ICTCs for GFATM, Counselor at Dept. of Education,Chandigarh 
						  Administration and as the Superintendent at CCWCD, Chandigarh, have been no less than exceptional.</p>
						</div>
					  </div>
					  <br>
						<a class="waves-effect waves-light btn c_class" id="co1"><i class="material-icons left">person</i>Select</a>

					
					</div>
					<div class="col s12 m4 l4 center card" style=" padding-bottom: 8px;">
						<img src="images/drakshay.jpg" style="margin:10px;" width="100px" height="120px;">
						<p><b>Akshay Kumar <br>Visiting Counselor<br>PhD, University of Delhi</b></p>
						<p><b>Availability:</b>Monday and Wednesday<br>
						   <b>Timings:</b>2.30 pm to 4.00 pm<br>
						   <b>Room No:</b> A 204, Academic Block<br>
						   <b>Email:</b> akshay@iiitd.ac.in<br>
						   <b>Contact Number:</b> <br> 011-26907448 <br> +91-9999801130 <br>
						   
						</p>

<!-- 						 <a class="waves-effect waves-light btn modal-trigger" href="#modal2">More Details</a>
 -->
					  <div id="modal2" class="modal">
						<div class="modal-content">
						 <h5>Akshay Kumar</h5><h6>Visiting Counselor;PhD, University of Delhi</h6>
						 <img src="images/drakshay.jpg" class="center">
						  <p>Senior Research Fellow Indian Council of Medical Research Consultant Psychologist at BLK Super Specialty 
						  Hospital and Artemis Hospital.<br><br>Franchise owner of "Men are from Mars Women are from Venus" Asia pacific region.</p>
						</div>
					  </div>

						<a class="waves-effect waves-light btn c_class" id="co2"><i class="material-icons left">person</i>Select</a>
					
					</div>
					

					<div class="col s12 m4 l4 center card" style=" padding-bottom: 8px;">
						<img src="images/dramita.jpg" style="margin:10px;" width="100px" height="120px;">
						<p><b>Amita Puri<br>Visiting Counselor,<br>PhD (PGI, Chandigarh)</b></p>

						<p><b>Availability:</b>Wednesday and Saturday<br>
						   <b>Timings:</b>2:00 pm to 4:30pm<br>
						   <b>Room No:</b> A-205, Academic Block.<br>
						   <b>Email:</b> amitapuri@iiitd.ac.in<br>
						   <b>Contact Number:</b><br>+91- 9717458266 <br>
						   
						</p>

<!-- 						<a class="waves-effect waves-light btn modal-trigger" href="#modal3">More Details</a>
 -->
					  <div id="modal3" class="modal">
						<div class="modal-content">
						  <h5>Amita Puri</h5><h6>Visiting Counselor; PhD (PGI, Chandigarh)</h6>
						  <img src="images/dramita.jpg" class="center">
						  <p>Clinical Attaché, Govt. Medical College, Chandigarh, Hypnotherapist from California Hypnosis Institute, 
						  Ex Counsellor, IIT Delhi, International Affiliate, American Psychological Association.<br><br>Written Two Books, 
						  Several Book Chapters and 50+ Research Publication's.</p>
						</div>
					  </div>
					  <br>
					  <a class="waves-effect waves-light btn c_class" id="co3"><i class="material-icons left">person</i>Select</a>
					</div>

					<div>
						
					</div>

				 </div>
				 </div>

				 <div style="padding: 16px;">
				
					<div class="row card">
						<div class="col s12 m4 l4">
						<p>Appointment With : </p><p><span><input style="margin: 0px;display: inline;width: 200px;" required id="selected_c" name="selected_c"></input></span></p>

						</div>
						
						<div class="input-field">
						<div class="col s12 m4 l4">
							<p>Choose Preferable Date</p>
  							<input type="date" name="date" id="date" required id="date" style="margin: 0px;display: inline;width: 200px;" >	
						</div>
						<div class="col s12 m4 l4">
							<p>Choose Preferable Time</p>
  							<input type="text" name="time" id="time" required id="time" style="margin: 0px;display: inline;width: 200px;">

						</div>
							
  										
						</div>	
				</div>

				<div class="row">
					<div class="col s12 m12 offset-m5 l2 offset-l5">
						<button class="center waves-light waves-effect btn"  type="submit" value="submit">Submit</button>

					</div>
					
				</div>

			</form>
			</div>
		

			 
		</div>

     
		
	</main>

       <footer class="page-footer notprint  center" style="opacity: 0.95;border-color: black;border-style: ridge;border-radius: 10px;margin-top: 20px;background-color: #e0f2f1;position:absolute;bottom:0;width: 100%;">

    <div class="container">
    <b style="color:black"><i>Copyright © 2019. IIIT-Delhi <br>
     Developed and Designed by: Himanshu Sundriyal&nbsp;and Divyanshu Sundriyal &nbsp;&nbsp; &nbsp;Powered by: Web Admin, IIIT-D </i></b>
    
    </div>
    </footer>  



    <script type="text/javascript" src="assets/js/materialize.js"></script>
         <script type="text/javascript" src="assets/js/jquery.timepicker.js"></script>

	<script>

		$(document).ready(function() {
			$('select').formSelect();
		});
		$(document).ready(function(){
		$('.modal').modal();
	  });

		 $(document).ready(function(){
		    $('.datepicker').datepicker();
		  });
		          
	</script>


	<script type="text/javascript">
        function change(obj){
            var idx = obj.selectedIndex; 
            var val = obj.options[idx].value;
            box = document.getElementById("whenandwhy");

            if(val == "Yes"){
            box.style.display = "inline";
            }
            else if(val == "No"){
                box.style.display = "none";
            }	

    }

	 $(".switch").find("input[type=checkbox]").on("change",function() {
        var status = $(this).prop('checked');
		box = document.getElementById("whenandwhy");
		var i = status ? 1 : 0;
		
		if(i == 1){
			$("#when").prop('disabled', false);
			$("#noss").prop('disabled', false);
			$("#why").prop('disabled', false);


            }
            else if(i == 0){
			$("#when").prop('disabled', true);
			$("#noss").prop('disabled', true);
			$("#why").prop('disabled', true);


        }	
    });

		 $("#switcher_pc").find("input[type=checkbox]").on("change",function() {
        var status = $(this).prop('checked');
        alert(status);
		box = document.getElementById("concerns");
		var i = status ? 1 : 0;
		
		if(i == 1){
			$("#concerns").prop('disabled', false);
            }
            else if(i == 0){
			$("#concerns").prop('disabled', true);
			$("#concerns").val("None");

        }	
    });
	 
			 $("#switcher_ac").find("input[type=checkbox]").on("change",function() {
        var status = $(this).prop('checked');
        alert(status);
		box = document.getElementById("maj_concern2");
		var i = status ? 1 : 0;
		
		if(i == 1){
			$("#maj_concern2").prop('disabled', false);
            }
            else if(i == 0){
			$("#maj_concern2").prop('disabled', true);
			$("#maj_concern2").val("None");

        }	
    });

	
		$(function(){
   $('a.c_class').click(function(){
		  var c_id =  $(this).attr('id');
		  	
			if(c_id == "co1"){
				$("#selected_c").val("Khushpinder P. Sharma");
				$('#time').timepicker('remove');
				$('#time').timepicker();
				$('#time').val("");
		  		$('#date').val("");

				// $('#time').timepicker({
				//     'disableTimeRanges': [
				//         ['1am', '2am'],
				//         ['3am', '4:01am']
				//     ]
				// });
			}
			else if(c_id == "co2"){
				$("#selected_c").val("Akshay Kumar");
				$('#time').timepicker('remove');
				$('#time').timepicker({
				    'minTime': '2:30pm',
				    'maxTime': '4:00pm',
				});
				$('#time').val("");
		  		$('#date').val("");

			}
			else{
				$("#selected_c").val("Amita Puri");
				$('#time').timepicker('remove');
				$('#time').timepicker({
			    'minTime': '2:00pm',
			    'maxTime': '4:30pm',
			});
				$('#time').val("");
		  		$('#date').val("");

			}
   });
	});



// 	$( ".datepicker.future" ).datepicker('option','beforeShowDay',function(date){
//     var td = date.getDay();
//     var ret = [(date.getDay() != 0 && date.getDay() != 6),'',(td != 'Sat' && td != 'Sun')?'':'only on workday'];
//     return ret;
// });


	function wordCount( val ){
		var wom = val.match(/\S+/g);
		return {
			charactersNoSpaces : val.replace(/\s+/g, '').length,
			characters         : val.length,
			words              : wom ? wom.length : 0,
			lines              : val.split(/\r*\n/).length
		};
	}

		var textarea1 = document.getElementById("concerns");
		var result1   = document.getElementById("result1");
		var textarea2 = document.getElementById("maj_concern2");
		var result2   = document.getElementById("result2");

		var textarea3 = document.getElementById("why");
		var result3   = document.getElementById("result3");

		var textarea4 = document.getElementById("when");
		var result4   = document.getElementById("result4");

		textarea1.addEventListener("input", function(){
		  var v = wordCount( this.value );
		if(v.words > 99)
		  { 
		  // Split the string on first 200 words and rejoin on spaces
	      var trimmed = $(this).val().split(/\s+/, 100).join(" ");
	      // Add a space at the end to make sure more typing creates new words
	      $(this).val(trimmed + " ");
	      alert("Word Limit Reached");

	  	  }

	  	 result1.innerHTML = (
			  "Words: "+ v.words +
			  " &nbsp; &nbsp;Words Left: "+ (100 - v.words)
		  );
		}, false);

		textarea2.addEventListener("input", function(){
		  var v = wordCount( this.value );
		  if(v.words > 99)
		  { 
		  // Split the string on first 200 words and rejoin on spaces
	      var trimmed = $(this).val().split(/\s+/, 100).join(" ");
	      // Add a space at the end to make sure more typing creates new words
	      $(this).val(trimmed + " ");
	      alert("Word Limit Reached");

	  	  }
		  result2.innerHTML = (
			  "Words: "+ v.words +
			  " &nbsp; &nbsp;Words Left: "+ (100 - v.words)
		  );
		}, false);

		textarea3.addEventListener("input", function(){
		  var v = wordCount( this.value );
		  if(v.words > 99)
		  { 
		  // Split the string on first 200 words and rejoin on spaces
	      var trimmed = $(this).val().split(/\s+/, 100).join(" ");
	      // Add a space at the end to make sure more typing creates new words
	      $(this).val(trimmed + " ");
	      alert("Word Limit Reached");

	  	  }
		  result3.innerHTML = (
			  "Words: "+ v.words +
			  " &nbsp; &nbsp;Words Left: "+ (100 - v.words)
		  );
		}, false);

		textarea4.addEventListener("input", function(){
		  var v = wordCount( this.value );
		  if(v.words > 9)
		  { 
		  // Split the string on first 200 words and rejoin on spaces
	      var trimmed = $(this).val().split(/\s+/, 10).join(" ");
	      // Add a space at the end to make sure more typing creates new words
	      $(this).val(trimmed + " ");
	      alert("Word Limit Reached");

	  	  }
		  result4.innerHTML = (
			  "Words: "+ v.words +
			  " &nbsp; &nbsp;Words Left: "+ (10 - v.words)
		  );
		}, false);

    </script>

	
	<!-- <script>
			$(document).ready(function(){
				alert("ajaja");
				var date_input=$('input[type="date"]'); //our date input has the name "date"
				var container= '#basic';
				var options={
					format: 'dd/mm/yyyy',
					container: container,
					todayHighlight: true,
					autoclose: false,
				};
				date_input.datepicker(options);
			})
	</script>

 -->
   	<script type="text/javascript">
   		 $('a.c_class').click(function() {
   		 	var c_id =  $(this).attr('id');
   		 	var name_var = ""
   		 	if(c_id == "co1"){
				name_var = "Khushpinder P. Sharma";
			}
			else if(c_id == "co2"){
				name_var = "Akshay Kumar";
			}
			else{
				
				name_var = "Amita Puri";
			}

		 $.ajax({
		  type: "POST",
		  url: "check_status.php",
		  data: { name: name_var }
		}).done(function( msg ) {
			alert(msg);
			if(msg.slice(0,-2) == "Appointment already requested. You can send reminder to respective Psychologist. Redirecting you to Main Portal Page ..."){
				window.open("stu_all_meetings.php","_self");

			}
			else{
				// alert(msg.valueOf().length + " " + "NO".length);
			}
		});    

		    });
   	</script>


</body>
</html>