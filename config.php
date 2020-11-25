<?php
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
   define('DB_SERVER', $dbparts['host']);
   define('DB_USERNAME', $dbparts['user']);
   define('DB_PASSWORD', $dbparts['pass']);
   define('DB_DATABASE', ltrim($dbparts['path'],'/'));
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>