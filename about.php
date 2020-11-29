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
    <title>Brew457 - Employees</title>
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
             <li><a href="./contact.php">About Us</a></li>
             <button><a href="logout.php">Logout</a></button>
    </ul>
        <div class="jumbotron" contenteditable="true">
			<h2>About Digital Collections</h2>
			<p>Digital Collections is a free application that can be used on any browser. Created by Neal Bhalodia as a project for Software Engineering at Towson University. The application runs on PHP and SQL on the backend and with HTML and Bootstrap on the front end. It is meant to be a way for users to create digital collections of products that they have. Once you register you can begin to use the application. Simply add items to your digital collections and then view them in on the collections page. You can also remove items and modify listings.</p>
            <p>Please contact nealbhalodia@gmail.com for any suggestions or questions.</p>
		</div>
  </body>
</html>