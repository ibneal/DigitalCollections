<?php
    session_start();
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $current_user = $_SESSION['username'];
    $item_name = $_POST['item_name'];
    $item_location = $_POST['item_location'];
    $item_notes = $_POST['item_notes']

    $conn=new mysqli($hostname,$username,$password,$database);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO collection (userId, name, location, notes) VALUES ('".$current_user."', '".$item_name."', '".$item_location."', '".$item_notes."');";

    $retval = mysql_query($sql,$conn);

       if(! $retval ) {
          die('Could not enter data: ' . mysql_error());
       }

       echo "Entered data successfully\n";

       mysql_close($conn);
?>