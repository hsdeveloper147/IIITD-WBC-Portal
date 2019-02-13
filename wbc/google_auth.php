<?php
	/*
	session_start();
	$_SESSION['email'] = "anshul16010@iiitd.ac.in";
	header('Location: meetCounsellors.php');
	




	#$_SESSION['email'] = "khushpinder@iiitd.ac.in";
	#$_SESSION["type"] = "admin";
	#header('Location: home.php');
	*/
	

	
	include('database_config.php');
	session_start();
	$id = $_REQUEST['token'];
	$google_auth_response = file_get_contents("https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=" . $id);
	$google_auth_response = json_decode($google_auth_response, 1);

	$email = trim($google_auth_response['email']);
	$name = trim($google_auth_response['name']);

	$query = "SELECT COUNT(*) FROM counsellors WHERE CID='$email'";
	$result = mysql_query($query, $db_connectionn);
	$row = mysql_fetch_row($result);
	
	if($row[0] == 1){
		$_SESSION['email'] = $email;
		$_SESSION["type"] = "admin";
        header("Location: home.php");
	}else if($row[0] == 0){
		$query = "SELECT COUNT(*) FROM students where semail='$email'";
		$result = mysql_query($query, $db_connectionn);
		$row = mysql_fetch_row($result);

		if($row[0] == 1){
			$_SESSION['email'] = $email;
			header('Location: meetCounsellors.php');
		}else if($row[0] == 0){
			header('Location: index.php?ret=3');
		}
	}
	
?>