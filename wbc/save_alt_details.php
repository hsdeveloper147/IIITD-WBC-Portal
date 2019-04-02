<?php  

if (session_status()==1) {
    session_start(); 
}
$name = "";
if( $_REQUEST["id"] ) {

   $id = $_REQUEST['id'];
   // echo "Welcome ". $id;
   $alt_e = $_REQUEST['alt_email'];
   $alt_c = $_REQUEST['alt_contact'];
   $res = $_REQUEST['resi'];
   $change = $_REQUEST['change'];


}

$database = 'wbc';
$host = 'localhost';
$user = 'root';
$pass = '';



if($change == 1)
{
    $conn = new mysqli($host, $user, $pass, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{

        $sql = "UPDATE wbc2018 SET aemail = '$alt_e' WHERE cid = '$id'";


        // echo $sql;
        // echo $id;
        if ($conn->query($sql) === TRUE) {
            // echo "Alternate Email updated successfully";
            $_SESSION["current_stu"][9] = $alt_e;
            // echo $alt_e;
            echo "1";

            $_SESSION['n_alt_e'] = $alt_e;
            $client = $_SESSION["current_stu"];
            if(isset($$_SESSION["current_stu"])){
                $_SESSION["current_stu"][9] = $alt_e;
                $client = $_SESSION["current_stu"];

            }
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();

    }

}
else if($change == 2)
{
    $conn = new mysqli($host, $user, $pass, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{

        $sql = "UPDATE wbc2018 SET acontact = '$alt_c' WHERE cid = '$id'";

        // echo $sql;
        // echo $id;
        if ($conn->query($sql) === TRUE) {
            // echo "Alternate contact updated successfully";
            echo "2";
            $_SESSION["current_stu"][11] = $alt_c;
            $client = $_SESSION["current_stu"];

        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();

    }
    
}
else{
    $conn = new mysqli($host, $user, $pass, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{

        $sql = "UPDATE wbc2018 SET accom = '$res' WHERE cid = '$id'";


        // echo $sql;
        // echo $id;
        if ($conn->query($sql) === TRUE) {
            // echo "Accomdoation type updated successfully";
            echo "3";
            $_SESSION["current_stu"][12] = $res;
            $client = $_SESSION["current_stu"];


        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();

    }
}

 



?>

