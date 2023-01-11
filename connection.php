<?php
    $conn = mysqli_connect("localhost", "root", "", "web_lanjut");
    $connlogin = mysqli_connect("localhost", "root", "", "web_lanjut");

    if(!$connlogin){
        echo "Connection failed";
        die();
    }
?>