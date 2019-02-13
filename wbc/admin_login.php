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
        <h5 style="text-align:center">Admin Login</h5>
        <div style="padding:10px" class="row z-depth-2">
			<form name="main_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"    method="post" class="form-horizontal" enctype="multipart/form-data" id="signupForm2" >  
				    <div class="row" style="padding:5px">
					<label>Username : </label>	<input name="username" id="username" type="text" placeholder="username">
                    </div>
                    <div class="row" style="padding:5px">

					<label>Password : </label>	<input name="password" id="password" type="password" placeholder="password">
					</div>
                    
                           

        <button style="margin-bottom:20px;"  type="submit" value="submit">Submit</button>
        </form>
		
        </div>
    </div>
	</main>



  

</body>
</html>