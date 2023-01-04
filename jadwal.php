<?php 
error_reporting(0);
require('data.php');
include('templates.php');

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Jadwal Pelajaran | 2022/2023</title>
</head>
<body>
    <header class="m-0 p-3 bg-primary shadow-sm mb-4">
        <div class="w-100 p-2 d-flex justify-content-end">
            <a href="login_view.php"><button class="btn btn-main px-4 py-2">Log In</button></a>
        </div>
        <div class="m-0 w-100 d-flex flex-column justify-content-center text-center align-items-center">
            <h1>JADWAL PELAJARAN</h1>
            <p class="fs-5">
                Politeknik Negeri Jakarta <br>2022/2023
            </p>
        </div>
    </header>
    <main class="d-flex flex-row-reverse">
        <div class="jadwal p-1 w-75">
            <?php 
            table($array_jadwal);
            ?>
        </div>
        <?php 
        filterSection($array_hari, $array_matkul, $array_dosen, $array_kelas);
        ?>
    </main>
    <!-- <script src="filterTable.js"></script> -->
    <script src="ajax.js"></script>
</body>
</html>