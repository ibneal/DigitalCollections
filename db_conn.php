<?php

$sname= "aqx5w9yc5brambgl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$unmae= "asv8nlrt3ji7v1ee";
$password = "zafjp7fo15x2qsek";

$db_name = "m13a7advxe1eiscn";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

?>