<?php
session_start();
?>

<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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