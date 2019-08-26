<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "snk";

// Create connection
$db =  mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ( !$db ) {
    die("Connection Error: " . mysqli_connect_error());
} 
?>