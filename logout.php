<?php
session_destroy();
echo "You have been logged out"
header('Refresh: 5; URL=https://digital-collections.herokuapp.com/');
?>