<?php
$hostname = 'localhost'; // Change this to your database host if it's different
$username = 'root';      // Change this to your database username
$password = '';          // Change this to your database password if you have one
$database = 'supermarket'; // Change this to your database name

$conn = mysqli_connect($hostname, $username, $password);

$db_selected = mysqli_select_db($conn, $database);



echo 'Connected to database ' . $database;


mysqli_close($conn);
?>
