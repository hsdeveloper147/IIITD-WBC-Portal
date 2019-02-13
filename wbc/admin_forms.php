<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {


$username=$_POST["username"];
$password=$_POST["password"];

$error=false;


if(!$error){

    // if no error save to database

    // Create connection

$database = 'wbc';
$host = 'localhost';
$user = 'root';
$pass = '';

    $conn = new mysqli($host, $user, $pass, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{


        $sql = "
        SELECT * FROM wbc_admins WHERE username='$username' AND password='$password' ";

        echo $sql;
        //exit();
        
        $result=$conn->query($sql);

        if($result->num_rows>0){


            $row=mysqli_fetch_row($result);

            session_start();
            $_SESSION["admin"]=$row;

            if($username=="admin"){
                $sql = "
                SELECT * FROM wbc2018";
            }
            else{
                $sql = "
            SELECT * FROM wbc2018 WHERE counsellor='".$_SESSION["admin"][2]."'";

            }
            
            echo $sql;

            $result=$conn->query($sql);

            if($result->num_rows>0){


                $row=mysqli_fetch_all($result);
                // print($row[0][2]);
                // exit();

                $_SESSION["clients"]=$row;
            }
            else{
                $_SESSION["clients"]="null";

            }

            header("Location: admin_welcome.php");

        }


}

 
}
}

?>
