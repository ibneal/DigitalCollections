<?php
include 'database.php';
  if ($_SESSION['loggedin']==True){
    header('Location: 192.168.1.9:12345/index.php');
  }
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Brew457 - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/login.js"></script>
  </head>

  <body>
    <ul class="topnav">
      <li><a class="active" href="index.php">Home</a></li>
      <?php
            if ($_SESSION['loggedin']==True){
              echo '<li><a href="./collections.php">Collections</a></li>';
            }?>
      <li><a href="./addItem.php">Add Item</a></li>
            <?php
                  if ($_SESSION['loggedin']==True){
                    echo '<li><a href="./addItem.php">Add Item</a></li>';
                  }?>
      <li><a href="./contact.php">Contact</a></li>
    </ul>
    <script src="login.js"></script>

    <form class="modal-content" action="/action_page.php">
      <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <div class="clearfix">
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
          <button type="submit" class="signupbtn">Sign Up</button>
        </div>
      </div>
    </form>

    <!-- Button to open the modal -->
  <div class="center-button">
<button class="logbutton" onclick="document.getElementById('id02').style.display='block'">Or Log In Here</button>
</div>
<!-- The Modal (contains the log in form) -->
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">CLOSE</span>
  <form class="modal-content" action="/action_page.php" method="post">
    <div class="container">
      <h1>Or click here to log in</h1>
      <p>Please fill in this form to log in to an existing account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" class="form-control" value="<?php echo $username; ?>" required>
      <span class="help-block"><?php echo $username_err;?></span>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <span class="help-block"><?php echo $password_err;?></span>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signup" onclick="<?php include database.php; login($email,$psw)?>">Log In</button>
      </div>
    </div>
  </form>
</div>
  </body>
</html>
