<?php
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $uname = $_POST['users_name'];
    $pword = $_POST['users_pass'];

    $conn=new mysqli($hostname,$username,$password,$database);

    $_SESSION['loggedin']=FALSE;

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

$sql = ("SELECT id, username FROM members WHERE username = '".$uname."' AND password = '".$pword."'");
$result = $conn->query($sql);

if($result->num_rows > 0) {
    echo"You are a validated user.";
    session_start();
    $_SESSION['loggedin']=TRUE;
    $_SESSION['username'] = $uname;
    header('Location: collection.php');
    }
else{
    echo"Sorry, your credentials are not valid, Please try again.";
    header('Refresh: 5; URL=https://digital-collections.herokuapp.com/');
    }
?>