<?php
include "templates.php";
require_once "database/config.php";

$kelas = "";
$hari = "";
$matkul = "";
$dosen = "";

if($_GET['k'] != "all"){
    $kelas = $_GET['k'];
}
if($_GET['h'] != "all"){
    $hari = $_GET['h'];
}
if($_GET['m'] != "all"){
    $matkul = $_GET['m'];
}
if($_GET['d'] != "all"){
    $dosen = $_GET['d'];
}

$result = $connectDB->query("SELECT * FROM jadwal WHERE kelas REGEXP '$kelas' 
                                AND hari REGEXP '$hari' 
                                AND mata_kuliah REGEXP '$matkul' 
                                AND dosen REGEXP '$dosen';");
if($result->num_rows > 0){
    table(iterator_to_array($result));
}else{
    ?>
    <h2 class="text-center">Tidak Ada Data</h2>
    <?php

}

?>