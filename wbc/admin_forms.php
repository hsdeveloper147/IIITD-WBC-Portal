<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

$database = 'wbc';
$host = 'localhost';
$user = 'root';
$pass = '';

    if(isset($_POST["act_logout"])){

   unset($_SESSION['admin']);

           session_destroy();

     header("Location: index.php");

}
    else if(isset($_POST["act_done"])){

        // Update

        $id=$_POST["id"];
        $client=$_SESSION["clients_new"][$id];

        $cid=$client[0];
        $counsellor=$client[17];
        $date=$client[18];
        $time=$client[19];

        $sql = "UPDATE wbc2018 SET done='True' WHERE cid='$cid' AND counsellor='$counsellor' AND date='$date' AND time='$time' ";

        // echo $sql;

        $conn = new mysqli($host, $user, $pass, $database);

        if ($conn->query($sql) === TRUE) {
           // echo "Updated successfully";

        


        // Get data

    $conn = new mysqli($host, $user, $pass, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{

            $sql = "
            SELECT * FROM wbc2018 WHERE counsellor='".$_SESSION["admin"][2]."'  AND done='False'";

            $sql2 = "
            SELECT * FROM wbc2018 WHERE counsellor='".$_SESSION["admin"][2]."'  AND done='True'";

            // echo $sql;

            $result=$conn->query($sql);

            if($result->num_rows>0){

                $row=mysqli_fetch_all($result);
                // print($row[0][2]);
                // exit();
                $_SESSION["clients_new"]=$row;
            }
            else{
                $_SESSION["clients_new"]="null";

            }

            $result=$conn->query($sql2);

            if($result->num_rows>0){


                $row=mysqli_fetch_all($result);
                // print($row[0][2]);
                // exit();

                $_SESSION["clients_past"]=$row;
            }
            else{
                $_SESSION["clients_past"]="null";

            }

           

        }

            header("Location: admin_welcome.php");


            
            
           

        }
    }


    else{

    //Login


    $username=$_POST["username"];
    $password=$_POST["password"];
        
    $conn = new mysqli($host, $user, $pass, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{


        $sql = "
        SELECT * FROM wbc_admins WHERE username='$username' AND password='$password' ";

        // echo $sql;
        //exit();
        
        $result=$conn->query($sql);

        if($result->num_rows>0){


            $row=mysqli_fetch_row($result);

            $_SESSION["admin"]=$row;

            if($username=="admin"){
                $sql = "
                SELECT * FROM wbc2018 WHERE done='False'";

                $sql2 = "
                SELECT * FROM wbc2018 WHERE done='True'";

                // echo $sql2;



            }
            else{
                $sql = "
            SELECT * FROM wbc2018 WHERE counsellor='".$_SESSION["admin"][2]."'  AND done='False'";

            $sql2 = "
            SELECT * FROM wbc2018 WHERE counsellor='".$_SESSION["admin"][2]."'  AND done='True'";

            // echo $sql;

            }


            $result=$conn->query($sql);

            if($result->num_rows>0){


                $row=mysqli_fetch_all($result);
                // print($row[0][2]);
                // exit();

                $_SESSION["clients_new"]=$row;
            }
            else{
                $_SESSION["clients_new"]="null";

            }


          

            // echo $sql2;

            $result=$conn->query($sql2);

            if($result->num_rows>0){


                $row=mysqli_fetch_all($result);
                // print($row[0][2]);
                // exit();

                $_SESSION["clients_past"]=$row;
            }
            else{
                $_SESSION["clients_past"]="null";

            }

            header("Location: admin_welcome.php");


            }
            
            else{

                $login_error="true";
                
            }
           

        }


}

}



?>
