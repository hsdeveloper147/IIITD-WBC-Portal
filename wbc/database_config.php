<?php 
    session_start();
    if(!isset($_SESSION["email"])){
        unset($_SESSION["email"]);
        unset($_SESSION["type"]);
        session_destroy();
        header("Location: index.php");
    }

?>

<?php

$server="localhost";

// Host Name of godaddy
//$server ="dedrelay.secureserver.net";
// $username="root";
// $password="";
// $db_name="wbc2018";
// $host = 'localhost';


// $db_connectionn = mysql_connect("$server", "$username", "$password");

$database = 'wbc2018';
$host = 'localhost';
$user = 'root';
$pass = '';

$db_connectionn = new PDO("mysql:dbname={$database};host={$host};port={3306}", $user, $pass);


if(!$db_connectionn)
{
      print("Error1: " . mysql_error());
}
//else echo "Connection done";

$db_select=mysql_select_db($db_name, $db_connectionn);
if(!$db_select)
{
    print("Error2: " . mysql_error());
}

$db_pdo = new PDO("mysql:host=$server;dbname=$db_name", $username, $password);
$db_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>