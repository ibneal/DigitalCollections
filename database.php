<?php

if (isset($_POST['action'])) {
    switch($_POST['action']) {
        case 'addItem':
            addItem();
            header("location:collection.php");
            break;
        case 'removeItem':
            removeItem();
            header("location:collection.php");
            break;
        }
}

function getCollections(){
    session_start();
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $current_user = $_SESSION['username'];

    $conn=new mysqli($hostname,$username,$password,$database);
        
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id, name, location, notes FROM collection WHERE userId = '".$current_user."'";
    
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['location'] . "</td><td>" . $row['notes'] . "</td></tr>";
        }
    }else {
      echo "0 results";
    }
}

function addItem(){

    session_start();
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');
    $conn=new mysqli($hostname,$username,$password,$database);

    $current_user = $_SESSION['username'];
    $item=$_POST['item'];
    $location=$_POST['location'];
    $notes=$_POST['notes'];

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql="INSERT INTO collection (userId, name, location, notes)
    VALUES ('${current_user}', '${item}', '${location}', '${notes}');";

    if ($conn->query($sql) === TRUE){
        return 'New record created successfully';
    }
    else{
        return "Error: " .$sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function removeItem(){
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $conn=new mysqli($hostname,$username,$password,$database);

    $item=$_POST['ritem'];

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM collection WHERE Id = (SELECT Id FROM collection WHERE name='${item}');";

    if ($conn->query($sql) === TRUE){
        return 'Record removed successfully';
    }
    else{
        return "Error: " .$sql . "<br>" . $conn->error;
    }
    $conn->close();
}


?>