<?php
session_start();//Put session start at the beginning of the file
include 'database.php';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Brew457 - Beers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
  <ul class="topnav">
      <li><a href="index.php">Home</a></li>
      <li><a href="./beer.php">Beer</a></li>
      <?php
      if ($loggedIn==True){
        echo '<li><a href="./employees.php">Employees</a></li>';
      }?>
      <li><a href="inventory.php">Inventory</a></li>
      <li><a href="order.php">Orders</a></li>
      <li><a href="./breweries.php">Breweries</a></li>
      <!-- <li><a href="./contact.php">Contact</a></li> -->
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
        <input type="text" id="search" onkeyup="search()" placeholder="Search for beers.." title="Type in a name">
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