<?php

// $database = 'wbc';
// $host = 'localhost';
// $user = 'root';
// $pass = '';

include 'database_config.php';

$given_email = "xyz@iiitd.ac.in";


 $conn = new mysqli($host, $user, $pass, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
 


         $sql = "SELECT * FROM wbc_ids WHERE email='$given_email'";

        // echo $sql;
        $result=$conn->query($sql);

        if($result->num_rows>0){

            $row=mysqli_fetch_all($result);
            
            $_SESSION["cid"]=$row[0][1];
            $_SESSION["email"]=$row[0][0];

            // echo  $_SESSION["cid"];
        }
        else{

            // NO CID .......  GENERATE A CID


        $sql = "SELECT count FROM counter";


        $result=$conn->query($sql);

        if($result->num_rows>0){


            $row=mysqli_fetch_all($result);
            

            $last_id=$row[0][0];
            // echo $last_id;

            $last_no = explode("O", $last_id)[1];
            // echo $last_no;

            $last_no=(int)$last_no;
            $last_no=$last_no+1;

            $last_no=(string)$last_no;

            $new_cid="WBCNO";

            $num_digits=4;

            for ($x = 0; $x < $num_digits-strlen($last_no); $x++) {
                   $new_cid=$new_cid."0";
                } 

         // echo $new_cid;

            $new_cid=$new_cid.$last_no;

            // UPDATE LAST ID in database

              $sql = "
        UPDATE counter SET count='$new_cid' ";

        // echo $sql;
        //exit();
        
        if ($conn->query($sql) === TRUE) {


        }
            


        $sql = "
        INSERT INTO wbc_ids (email,id) VALUES ('$given_email','$new_cid')";

        // echo $sql;
        //exit();
        
        if ($conn->query($sql) === TRUE) {

         $_SESSION["cid"]=$new_cid;

        $_SESSION["email"]=$given_email;


         // echo $new_cid;




        }
            // echo $new_cid;



        }



    }
}


$conn = new mysqli($host, $user, $pass, $database);

$email=$given_email;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{


            $sql = "
        SELECT * FROM wbc2018 WHERE email='$email' AND done='False'";

        $sql2 = "
        SELECT * FROM wbc2018 WHERE email='$email' AND done='True'";

        // echo $sql;

        


        $result=$conn->query($sql);

        if($result->num_rows>0){


            $row=mysqli_fetch_all($result);
            // print($row[0][2]);
            // exit();

            $_SESSION["meetings_new"]=$row;
        }
        else{
            $_SESSION["meetings_new"]="null";

        }

        // echo $sql2;

        $result=$conn->query($sql2);

        if($result->num_rows>0){


            $row=mysqli_fetch_all($result);
            // print($row[0][2]);
            // exit();

            $_SESSION["meetings_past"]=$row;
        }
        else{
            $_SESSION["meetings_past"]="null";

        }

    }

?>