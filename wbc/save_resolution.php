<?php 
	include('database_config.php');
    if(!isset($_SESSION["email"])){
        unset($_SESSION["email"]);
        unset($_SESSION["type"]);
        session_destroy();
        header("Location: index.php");
    }
?>

<?php
	
	if(isset($_REQUEST["saveResolution"])) {
		$aid = mysql_real_escape_string(trim($_REQUEST["aid"]));
		
		$aprob_area = mysql_real_escape_string(trim($_REQUEST["aprob_area"]));
		$aprob_area_remark = mysql_real_escape_string(trim($_REQUEST["aprob_area_remark"]));
		$amedical_state_remark = mysql_real_escape_string(trim($_REQUEST["amedical_state_remark"]));
		$ahistory = mysql_real_escape_string(trim($_REQUEST["ahistory"]));
		$ainterventions = mysql_real_escape_string(trim($_REQUEST["ainterventions"]));

		$statement = $db_pdo->prepare("UPDATE `application` SET `aprob_area` = :aprob_area, `aprob_area_remark` = :aprob_area_remark, `amedical_state_remark` = :amedical_state_remark, `ahistory` = :ahistory, `ainterventions` = :ainterventions, `astatus` = 2 WHERE AID = :aid");

		$db_array = array(":aprob_area" => "$aprob_area", ":aprob_area_remark" => "$aprob_area_remark", ":amedical_state_remark" => "$amedical_state_remark", ":ahistory" => "$ahistory", ":ainterventions" => "$ainterventions", ":aid" => substr(strrchr($aid, "A"), 1));

		echo var_dump($db_array);

		
		try {
			$statement->execute($db_array);
			header("Location: home.php?ret=2");
		}catch (PDOException $e) {
			unlink($target_file);
			header("Location: home.php?ret=3");
		}
	}

?>