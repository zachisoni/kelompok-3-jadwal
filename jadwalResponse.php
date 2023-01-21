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

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 5;
$offset = ($pageno-1) * $no_of_records_per_page;

$result = $connectDB->query("SELECT * FROM jadwal WHERE kelas LIKE '%".$kelas."%'
                                AND hari LIKE '%".$hari."%' 
                                AND mata_kuliah LIKE '%".$matkul."%' 
                                AND dosen LIKE '%".$dosen."%';");

$total_rows = $result->num_rows;
$total_pages = ceil($total_rows / $no_of_records_per_page);

$result_limit = $connectDB->query("SELECT * FROM jadwal WHERE kelas LIKE '%".$kelas."%'
                                    AND hari LIKE '%".$hari."%' 
                                    AND mata_kuliah LIKE '%".$matkul."%' 
                                    AND dosen LIKE '%".$dosen."%'LIMIT $offset, $no_of_records_per_page;");
if($result_limit->num_rows > 0){
    table(iterator_to_array($result_limit));
}else{
    ?>
    <h2 class="text-center">Tidak Ada Data</h2>
    <?php
}

?>

<ul class="pagination justify-content-center mx-auto">
    <?php
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i != $pageno) {
        echo "<li> <a class = 'p-3 btn border border-dark m-2 pagination' onclick='changePage($i, `jadwalResponse.php`)'>$i</a> </li>";
        } else {
        echo "<li> <a class = 'p-3 btn text-primary border border-primary m-2' href='#'>$i</a> </li>";
         }
    } ?>
</ul> 