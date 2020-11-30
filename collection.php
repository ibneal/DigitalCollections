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
      <div class="row justify-content-center">
        <div class="col-md-4">
        <button class="btn btn-secondary" onclick="location.href = 'https://digital-collections.herokuapp.com/addItem.php';">Add Item</button>
        <button class="btn btn-danger" onclick="">Remove Item</button>
        <button class="btn btn-secondary" onclick="">Update Item</button>
        <input type="text" id="search" onkeyup="search()" placeholder="Search for items.." title="Type in a name">
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