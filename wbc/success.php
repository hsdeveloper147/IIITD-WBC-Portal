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
		<div class="container form_row">

				Your request for appointment has been successfully registered.
			
		</div>
		
	</main>

	<footer class="page-footer notprint white" style="opacity: 0.95;border-color: black;border-style: ridge;border-radius: 10px;">

        <div class="footer-copyright white">
        <div class="container">
        <b style="color:black"><i>© 2019 &nbsp;| Designed by: Himanshu Sundriyal&nbsp;| &nbsp;Powered by: Web Admin IIIT-D </i></b>
        
        </div>
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
	

	
		$(function(){
   $('a.c_class').click(function(){
		  var c_id =  $(this).attr('id');
			if(c_id == "co1"){
				$("#selected_c").val("Khushpinder P. Sharma");
				$('#time').timepicker('remove');
				$('#time').timepicker();
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

			}
			else{
				$("#selected_c").val("Amita Puri");
				$('#time').timepicker('remove');
				$('#time').timepicker({
			    'minTime': '2:00pm',
			    'maxTime': '4:30pm',
			});

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

		textarea1.addEventListener("input", function(){
		  var v = wordCount( this.value );
		  if(v.words > 99) alert("Word Limit Reached");
		  result1.innerHTML = (
			  "Words: "+ v.words +
			  " &nbsp; &nbsp;Words Left: "+ (100 - v.words)
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
   


</body>
</html>