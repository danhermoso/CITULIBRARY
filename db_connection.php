<?php
$host = 'localhost'; // Hostname
$username = 'root'; // sql username
$password = ''; // sql password
$database = 'citu'; // Database name
$port = 3308;

// Establishing the database connection
$connection = mysqli_connect($host, $username, $password, $database, $port);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
