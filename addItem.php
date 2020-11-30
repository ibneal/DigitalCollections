<?php
session_start();
include 'database.php';
if(!$_SESSION['loggedin']){
    header('Location: index.php'); }
$current_user = $_SESSION['username'];

 //Put session start at the beginning of the file
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Item Digital Collection</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <ul class="topnav">
     <?php
                   if ($_SESSION['loggedin']==True){
                     echo '<li><a href="./collection.php">Collections</a></li>';
                   }?>
                   <?php
                         if ($_SESSION['loggedin']==True){
                           echo '<li><a href="./addItem.php">Add Item</a></li>';
                         }?>
             <li><a href="./about.php">About Us</a></li>
             <li><a href="logout.php">Logout</a></li>
    </ul>
<div class="row justify-content-center">
<div class="col-md-9">
<form action="addItem_helper.php" method="post">
<div class="form-group">
 <label for="item_name"><b>Item Name</b></label>
    <input type="text" class="form-control" placeholder="Enter item name" name="item_name" required>
  </div>
  <div class="form-group">
   <label for="item_location"><b>Username</b></label>
      <input type="text" class="form-control" placeholder="Enter item location if applicable" name="item_location" required>
    </div>
    <div class="form-group">
    <label for="item_notes"><b>Item notes</b></label>
    <input type="text" class="form-control" placeholder="Enter item notes" name="item_notes" required>
</div>
    <button type="submit" class="btn btn-primary">Add item</button>
</form>
</div>
</div>
  </body>
</html>