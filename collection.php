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
        <li><a href="logout.php">Logout</a></li>
      </ul>
    <div id="addItemModal" class="modal">
              <form class="modal-content" action="database.php" method="post">
                <span onclick="document.getElementById('addItemModal').style.display='none'" class="close" title="Close Modal">CLOSE</span>
                <div class="container">
                  <h1>Add a New Item</h1>
                  <hr>
                  <input type="hidden" name="action" value="addItem"/>
                  <label for="item"><b>Name of Item</b></label>
                    <input type="text" placeholder="Enter Item Name" name="item" required/>
                    <label for="location"><b>Location of Item</b></label>
                    <input type="text" placeholder="Enter Item Location" name="location" required/>
                    <label for="notes"><b>Notes</b></label>
                    <input type="text" placeholder="Enter Notes" name="notes" required/>

                    <div class="clearfix">
                      <button type="button" onclick="document.getElementById('addItemModal').style.display='none'" class="cancelbtn">Cancel</button>
                      <button type="submit" class="newItem">Add Item</button>
                    </div>
                </div>
              </form>
            </div>

        <div id="removeItemModal" class="modal">
          <form class="modal-content" action="database.php" method="post">
            <span onclick="document.getElementById('removeItemModal').style.display='none'" class="close" title="Close Modal">CLOSE</span>
            <div class="container">
              <h1>Remove a Item</h1>
              <hr>
              <input type="hidden" name="action" value="removeItem"/>
              <label for="ritem"><b>Name of Item</b></label>
              <input type="text" placeholder="Enter Item Name" name="ritem" required/>
              <div class="clearfix">
                <button type="button" onclick="document.getElementById('removeItemModal').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" class="newBeer">Remove Item</button>
              </div>
            </div>
          </form>
        </div>

        <script src='./js/search.js'></script>
        <div class="card">
          <h2 class="card-header text-center">Item List</h2>
          <div class="row">
            <div class="col-md" align="center">
            <button class="btn btn-primary" onclick="document.getElementById('addItemModal').style.display='block'">Add Item</button>
            <button class="btn btn-danger" onclick="document.getElementById('removeItemModal').style.display='block'">Remove Item</button>
            <input type="text" id="search" onkeyup="search()" placeholder="Search by item.." title="Type in a name">
        <div class="container-fluid">
        <table class="table" id="results">
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
      </div>
  </body>
</html>