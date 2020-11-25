<?php 
session_start();
$sname= "aqx5w9yc5brambgl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$unmae= "asv8nlrt3ji7v1ee";
$password = "zafjp7fo15x2qsek";
$db_name = "m13a7advxe1eiscn";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT Id FROM members WHERE username='{$_POST[uname]}' AND password='{$_POST[password]}';";

		if ($conn->query($sql) === TRUE){
                echo "Login success...";
                $_SESSION['loggedin']=TRUE;
                header('Location: collection.php');
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
?>