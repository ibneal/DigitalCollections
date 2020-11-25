<?php 

$sname= "aqx5w9yc5brambgl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$unmae= "asv8nlrt3ji7v1ee";
$password = "zafjp7fo15x2qsek";
$db_name = "m13a7advxe1eiscn";

$con = mysqli_connect($sname, $unmae, $password, $db_name);

if(! $con)
{
    die('Connection Failed'.mysql_error());
}

// Grab User submitted information
$username = $_POST["users_name"];
$pass = $_POST["users_pass"];


// Select the database to use
mysql_select_db("m13a7advxe1eiscn",$con);

$result = mysql_query("SELECT username, password FROM members WHERE username = $username");

$row = mysql_fetch_array($result);

if($row["username"]==$username && $row["password"]==$pass)
    echo"You are a validated user.";
else
    echo"Sorry, your credentials are not valid, Please try again.";
?>