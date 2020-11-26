<?php
session_start();
include 'database.php';
if(!$_SESSION['loggedin']){
    header('Location: index.php'); }
 //Put session start at the beginning of the file
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Collections - Digital Collections</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
      <ul class="topnav">
        <li><a class="active" href="index.php">Home</a></li>
        <?php
              if ($_SESSION['loggedin']==True){
                echo '<li><a href="./collections.php">Collections</a></li>';
              }?>
              <?php
                    if ($_SESSION['loggedin']==True){
                      echo '<li><a href="./addItem.php">Add Item</a></li>';
                    }?>
        <li><a href="./contact.php">Contact</a></li>
      </ul>
    <script src='./js/search.js'></script>
    <div class="card">
      <h2 class="card-header text-center">Beer List</h2>
      <div class="row">
        <div class="col-md"></div>
        <div class="col-md-9">
        <button class="signupbtn" onclick="document.getElementById('id03').style.display='block'">Add Item</button>
        <button class="cancelbtn" onclick="document.getElementById('id02').style.display='block'">Remove Item</button>
        <button class="logbutton" onclick="document.getElementById('id03').style.display='block'">Update Item</button>
        <input type="text" id="search" onkeyup="search()" placeholder="Search for items.." title="Type in a name">
        <table id="beer">
            <tr>
              <th>id</th>
              <th>name</th>
              <th>location</th>
              <th>notes</th>
            </tr>
            <?php
              echo getCollections();
          ?>
          <table>
        </div>
        <div class="col-md"></div>
      </div>
  </body>
</html>