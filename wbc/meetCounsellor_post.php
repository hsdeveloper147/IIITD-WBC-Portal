<?php 
    include('database_config.php');
    
	if(isset($_REQUEST["Schedule"])){

		$SID = mysql_real_escape_string(trim($_REQUEST["SID"]));
		$concern = mysql_real_escape_string(trim($_REQUEST["concern"]));
		$preference = mysql_real_escape_string(trim($_REQUEST["preference"]));
		$CID = mysql_real_escape_string(trim($_REQUEST["CID"]));

		$query = "INSERT INTO `application`(`SID`, `aapply_date`, `concern`, `preference`, `CID`) VALUES ('$SID', NOW(), '$concern', '$preference', '$CID')";
		
		$statement = $db_pdo->prepare("INSERT INTO `application`(`SID`, `aapply_date`, `concern`, `preference`, `CID`) VALUES ( :sid, NOW(), :concern, :preference, :CID)");
		$db_array = array(":sid" => "$SID", ":concern" => "$concern", ":preference" => "$preference", ":CID" => "$CID");

		try {
			$statement->execute($db_array);
			$id = $db_pdo->lastInsertId();
		}catch (PDOException $e) {
			header("Location: index.php?ret=1");
		}

		header("Location: index.php?ret=2&aid=$id");
	}

	
		/*
		$target_file = $root_dir . "uploads/" . $email . ".pdf";

		$file_type = strtolower(pathinfo(basename($_FILES["resume"]["name"]), PATHINFO_EXTENSION));

		if( $file_type != "pdf" && $_FILES["resume"]["error"]!=0){
			header("Location: login.php?ret=2");
		}
		
		
		$file_copy = 0;
		if(file_exists($target_file)){
			copy($target_file, $root_dir . "uploads/temp.pdf");
			$file_copy = 1;
		}

		$file = file($_FILES["resume"]["tmp_name"]);
		$endfile= trim($file[count($file) - 1]);
		$n="%%EOF";

		if(!($endfile === $n)){
			if($file_copy == 1){
	        	unlink($root_dir . "uploads/temp.pdf");
	        }
	        header("Location: login.php?ret=2");
		}else if (!move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
	        if($file_copy == 1){
	        	unlink($root_dir . "uploads/temp.pdf");
	        }
	        header("Location: login.php?ret=2");
	    }else{
	    	if($file_copy == 1){
		    	unlink($root_dir . "uploads/temp.pdf");
		    }

			$fname = mysql_real_escape_string(trim($_REQUEST["fname"]));
			$lname = mysql_real_escape_string(trim($_REQUEST["lname"]));
			$college = mysql_real_escape_string(trim($_REQUEST["college"]));
			$cgpa = mysql_real_escape_string(trim($_REQUEST["cgpa"]));

			$any_other_lang = mysql_real_escape_string(trim($_REQUEST["other_lang"]));
			$sdate = mysql_real_escape_string(trim($_REQUEST["sdate"]));
			$edate = mysql_real_escape_string(trim($_REQUEST["edate"]));
			$hostel = mysql_real_escape_string(trim($_REQUEST["hostel"]));

			$lang = "0000";
			if (isset($_REQUEST["lang_known1"]))
				$lang[0] = 1;
			if (isset($_REQUEST["lang_known2"]))
				$lang[1] = 1;
			if (isset($_REQUEST["lang_known3"]))
				$lang[2] = 1;
			if (isset($_REQUEST["lang_known4"]))
				$lang[3] = 1;

			$os = "000";
			if (isset($_REQUEST["os1"]))
				$os[0] = 1;
			if (isset($_REQUEST["os2"]))
				$os[1] = 1;
			if (isset($_REQUEST["os3"]))
				$os[2] = 1;


			$statement = $db_pdo->prepare("INSERT INTO `student_info`(`email`, `fname`, `lname`, `college`, `cgpa`, `languages`, `others`, `os`, `hostel`, `sdate`, `edate`, `project_no`) VALUES (:email, :fname, :lname, :college, :cgpa, :lang, :any_other_lang, :os, :hostel, :sdate, :edate, :pro_num)");

			$db_array = array(":email" => "$email", ":fname" => "$fname", ":lname" => "$lname", ":college" => "$college", ":cgpa" => "$cgpa", ":lang" => "$lang", ":any_other_lang" => $any_other_lang, ":os" => "$os", ":hostel" => $hostel, ":sdate" => "$sdate", ":edate" => "$edate", ":pro_num" => 0);

			try {
				$statement->execute($db_array);
			}catch (PDOException $e) {
			    unlink($target_file);
				header("Location: login.php?ret=1");
			}

			session_start();
			$_SESSION["email"] = $email;
			header("Location: index.php");

				
	    }
	    */
    
?>