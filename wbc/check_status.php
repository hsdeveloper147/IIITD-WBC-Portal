<?php  
// include 'database_config.php';

$database = 'wbc';
$host = 'localhost';
$user = 'root';
$pass = '';

$name = "";
if( $_REQUEST["name"] ) {

   $name = $_REQUEST['name'];
   $given_email = $_REQUEST['email'];
   // echo "Welcome ". $name;
}




// $given_email = "xyz@iiitd.ac.in";



 $conn = new mysqli($host, $user, $pass, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{



         $sql = "SELECT * FROM wbc2018 WHERE email='$given_email' AND counsellor='$name' AND done='False'";

        // echo $sql;

        $result=$conn->query($sql);

        if($result->num_rows>0){

            $row=mysqli_fetch_all($result);
            
            $_SESSION["cid"]=$row[0][1];
            $_SESSION["email"]=$row[0][0];

            echo  "Appointment already requested. You can send reminder to respective Psychologist. Redirecting you to Main Portal Page ...";
        }
        else{
        	echo "Selected : ".$name;
        }
    }

?>

