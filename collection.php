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
        <?php
              if ($_SESSION['loggedin']==True){
                echo '<li><a href="./collection.php">Collections</a></li>';
              }?>
              <?php
                    if ($_SESSION['loggedin']==True){
                      echo '<li><a href="./addItem.php">Add Item</a></li>';
                    }?>
        <li><a href="./about.php">About Us</a></li>
      </ul>
    <script src='./js/search.js'></script>
    <div class="card">
      <h2 class="card-header text-center">Items in your Digital Collection</h2>
      <div class="row">
        <div class="col-md">
        <button type="button" class="btn btn-primary" onclick="document.getElementById('id03').style.display='block'">Add Item</button>
        <button type="button" class="btn btn-secondary" onclick="document.getElementById('id02').style.display='block'">Remove Item</button>
        <input type="text" id="search" onkeyup="search()" placeholder="Search for items.." title="Type in a name">
        </div>
        <div class="col-md-9">
        <table class="table" id="collection">
            <tr>
              <th>id</th>
              <th>name</th>
              <th>location</th>
              <th>notes</th>
            </tr>
            <?php
              $current_user = $_SESSION['username'];
              echo getCollections();
          ?>
          <table>
        </div>
      </div>
  </body>
</html>