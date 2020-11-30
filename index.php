<?php
session_start();

if($_SESSION['loggedin'] == True){
    header('Location: collection.php'); }
$current_user = $_SESSION['username'];

 //Put session start at the beginning of the file
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>

 <div class="border border-light p-3 mb-4">
   <div class="text-center">
	<h2>Digital Collections</h2>
	<p>Digital Collections is a free application that can be used on any browser. Created by Neal Bhalodia as a project for Software Engineering at Towson University. The application runs on PHP and SQL on the backend and with HTML and Bootstrap on the front end. It is meant to be a way for users to create digital collections of products that they have. Once you register you can begin to use the application. Simply add items to your digital collections and then view them in on the collections page. You can also remove items and modify listings.</p>
	</div>
	</div>

<div class="text-center">
<div class=d-flex justify-content-center">
<form action="login.php" method="post">
<div class="form-group">
 <label for="users_name"><b>Username</b></label>
    <input type="text" class="form-control" placeholder="Enter Username" name="users_name" required>
  </div>
    <div class="form-group">
    <label for="users_pass"><b>Password</b></label>
    <input type="password" class="form-control" placeholder="Enter Password" name="users_pass" required>
</div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
</div>


</body>
</html>