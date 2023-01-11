<?php
session_start();
    $_SESSION['berhasil'] = false;
    unset($_SESSION['username']);
    unset($_SESSION['error']);
    header('Location: login.php');