<?php
$table_name="wbc2018";

// $id=$_SESSION["sess_user_id"];
// echo "$id";
// echo($_SESSION["user"][3]);
if ($_SERVER["REQUEST_METHOD"] == "POST") {


$cid= generateRandomString();
$roll=$_POST["roll"];
$name=$_POST["name"];
$age=$_POST["age"];
$gender=$_POST["gender"];
$program=$_POST["program"];
$branch=$_POST["branch"];
$sem=$_POST["sem"];
$email=$_POST["email"];
$aemail=$_POST["aemail"];
$contact=$_POST["contact"];
$acontact=$_POST["acontact"];
$accom=$_POST["accom"];

if(isset($_SESSION['past_when'])){
$past_when=$_POST["past_when"];
}
else{
    $past_when="none";

}
if(isset($_SESSION['past_why'])){

$past_why=$_POST["past_why"];
}
else{
    $past_why="none";

}
if(isset($_SESSION['past_no_of_sess'])){

$past_no_of_sess=$_POST["past_no_of_sess"];
}
else{
    $past_no_of_sess="none";

}
$maj_concern=$_POST["maj_concern"];
$counsellor=$_POST["selected_c"];

$date=$_POST["date"];

$time=$_POST["time"];


// $counsellor=$_POST["counsellor"];
// $date=$_POST["date"];
// $time=$_POST["time"];

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
        INSERT INTO wbc2018 (cid,roll,name,age,gender,program,branch,sem,email,aemail,contact,acontact,accom,past_when,past_why,past_no_of_sess,maj_concern,counsellor,date,time)
VALUES ('$cid','$roll','$name','$age','$gender','$program','$branch','$sem','$email','$aemail','$contact','$acontact','$accom','$past_when','$past_why','$past_no_of_sess','$maj_concern','$counsellor','$date','$time')";

        // echo $sql;
        //exit();
        
        if ($conn->query($sql) === TRUE) {


           header("Location: success.php");

        //  $sql="SELECT * FROM $table_name WHERE id='$id' ";

        // // $result=$conn->query($sql);

        // // if($result->num_rows>0){


        // //     $row=mysqli_fetch_row($result);

        // //     $_SESSION["user"]=$row;

        // // }


        // // } else {

        // //     $persoanl_success="n";

        // //     echo "Error: " . $sql . "<br>" . $conn->error;
        // // }

        $conn->close();
    }


}

 
}
else{
    echo $error;
}
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
