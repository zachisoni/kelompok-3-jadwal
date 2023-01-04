<?php
    $conn = mysqli_connect("localhost", "root", "", "database_jadwal");
    $connlogin = mysqli_connect("localhost", "root", "", "database_jadwal");

    if(!$connlogin){
        echo "Connection failed";
        die();
    }
?>