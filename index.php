<?php
session_start();
include 'check.php';
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>

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
</body>
</html>