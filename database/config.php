<?php

$hostname = "localhost";
$usernameDB = "root";
$passwordDB = "";
$database = "web_lanjut";


$connectDB = new mysqli($hostname, $usernameDB, $passwordDB, $database);

if ($connectDB->connect_error){
    die("Connection failed: ". $db->connect_error);
}