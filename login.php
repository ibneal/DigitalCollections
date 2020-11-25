<?php

$host="aqx5w9yc5brambgl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$user="asv8nlrt3ji7v1ee";
$password="zafjp7fo15x2qsek";
$db="m13a7advxe1eiscn";

mysql_connect($host,$user,$password);
mysql_select_db($db);

if(isset($_POST['username'])){

    $uname=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from members where username='".$uname."'AND password='".$password."' limit 1";

    $result=mysql_query($sql);

    if(mysql_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
	<link rel="stylesheet" a href="css\style.css">
	<link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
<body>
	<div class="container">
	<img src="image/login.png"/>
		<form method='POST' action='#'>
			<div class="form-input">
				<input type="text" name="text" placeholder="Enter the User Name"/>
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password"/>
			</div>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>
