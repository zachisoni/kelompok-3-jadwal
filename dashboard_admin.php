<?php
    include 'connection.php';
    error_reporting(0);
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard Admin</title>
        <link rel="stylesheet" type="text/css" href="style_dashboard_admin.css">
    </head>
    <body>
        <div class="sidebar left">
            <p class="text">e-shedule</p>

            <div class="profile">
                <button></button>
            </div>

            <div class="admin-name">
            <p class="text-admin">Admin</p>
            </div>

            <div class="upload">
                <button>Unggah Jadwal</button>
            </div>

            <form action="login.php" method="POST" class="logout">
                <div class="btn-logout">
                    <button name="submit" class="btn">Logout</button>
                </div>
            </form>
        </div>
    </body>
</html>