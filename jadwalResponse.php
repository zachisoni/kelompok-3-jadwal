<?php
include "templates.php";
include "data.php";


if($_GET['k'] != "all"){
    $array_jadwal = array_filter($array_jadwal, function($row){
        return $row['val6'] == $_GET['k'] || $row['val6'] == "Kelas";
    });
}
if($_GET['h'] != "all"){
    $array_jadwal = array_filter($array_jadwal, function($row){
        return $row['val1'] == $_GET['h'] || $row['val1'] == "Hari";
    });
}
if($_GET['m'] != "all"){
    $array_jadwal = array_filter($array_jadwal, function($row){
        return $row['val3'] == $_GET['m'] || $row['val3'] == "Mata Kuliah";
    });
}
if($_GET['d'] != "all"){
    $array_jadwal = array_filter($array_jadwal, function($row){
        return $row['val4'] == $_GET['d'] || $row['val4'] == "Dosen";
    });
}

if(sizeof($array_jadwal) > 1){
    table($array_jadwal);
} else{
    ?>
    <h2 class="text-center">No Data</h2>
    <?php
}

?>