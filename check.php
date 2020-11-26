<?php
session_start();
if(!($_SESSION['loggedin']) == True ))
{
    header("Location: https://digital-collections.herokuapp.com/index.php")
}
?>