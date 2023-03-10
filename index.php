<?php 
error_reporting(0);
include "templates.php" ;
require_once "database/config.php";

session_start();

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
    } else {
    $pageno = 1;
    }

$no_of_records_per_page = 5;
$offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT * FROM jadwal";
$result = $connectDB->query($total_pages_sql);
$total_rows = $result->num_rows;
$total_pages = ceil($total_rows / $no_of_records_per_page);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/94869fffad.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"
    integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <title>Jadwal Pelajaran 2022/2023</title>
    <style>
        .bg-primary{
            background-color: #A2E8CF !important;color: #313131;
        }
        .btn-main{
            background-color: #29BB7E !important;color: #ffffff;
            transition: 0.5s;
        }
        .btn-main:hover{
            background-color: #ffffff !important;color: #29BB7E;
        }
    </style>
</head>
<body onload="filter('jadwalResponse.php');">
    <header class="m-0 p-3 bg-primary shadow-sm mb-4">
        <div class="w-100 p-2 d-flex justify-content-end">
            <a href="login.php" class="btn btn-main px-4 py-2">Log In</a>
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
        </div>
        <?php 
        $array_dosen = array();
        $array_hari = array();
        $array_matkul = array();
        $array_kelas = array();
        $filter = $connectDB->query($total_pages_sql);

        foreach (iterator_to_array($filter) as $row) {
            if($row[1] != "Hari"){
                array_push($array_hari, $row["hari"]);
                array_push($array_matkul, $row["mata_kuliah"]);
                array_push($array_dosen, $row["dosen"]);
                array_push($array_kelas, $row["kelas"]);
            }
        }
        
        $array_hari = array_unique($array_hari);
        $array_dosen = array_unique($array_dosen);
        $array_matkul = array_unique($array_matkul);
        $array_kelas = array_unique($array_kelas);
        filterSection($array_hari,$array_matkul,$array_dosen,$array_kelas);
        ?>
    </main>
    <script src="ajax.js"></script>




</body>
</html>