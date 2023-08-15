<?php
$host = 'localhost' ;
$database =  'forum';
$username = 'root';
$password = "";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
