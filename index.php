<?php 
error_reporting(0);
// require "data.php";
include "templates.php" ;
require_once "database/config.php";

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<?php 
$title = "Jadwal Pelajaran 2022/2023";
include "partials/head.php";
?>
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
<body>
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
            <?php 
            $jadwal = $connectDB->query("SELECT * FROM jadwal;");
            if($jadwal->num_rows > 0){
                table(iterator_to_array($jadwal));
            } else {
                ?>
                <h2 class="text-center">Tidak Ada Data</h2>
                <?php
            }
            ?>
        </div>
        <?php 
        $array_dosen = array();
        $array_hari = array();
        $array_matkul = array();
        $array_kelas = array();

        foreach (iterator_to_array($jadwal) as $row) {
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