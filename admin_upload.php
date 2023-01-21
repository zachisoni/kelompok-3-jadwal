<?php
// require_once "database/config.php";

session_start();
if ($_SESSION['berhasil'] == false) {
    header('Location: login.php');
    die();
}
$hasil = json_decode(file_get_contents("database/data.json"), true);

$dosen = array();
$hari = array();
$matkul = array();
$kelas = array();
foreach ($hasil as $row) {
    if($row[1] != "Hari"){
        array_push($hari, $row["hari"]);
        array_push($matkul, $row["mata_kuliah"]);
        array_push($dosen, $row["dosen"]);
        array_push($kelas, $row["kelas"]);
    }
}

$hari = array_unique($hari);
$dosen = array_unique($dosen);
$matkul = array_unique($matkul);
$kelas = array_unique($kelas);


$filter = array();
?>

<!DOCTYPE html>
<html lang="en">
<?php $title = 'Dashboard Admin';
include 'partials/head.php' ?>

<body onload="filter('partials/table.php');">
    <div class="main-container d-flex">
        <?php $isActive = 'unggah-jadwal';
        include "partials/sidebar.php" ?>
        <div class="content mx-auto">
            <div class=" mx-auto text-center">
                <label for="formFile" class="form-label m-4">
                    <h1 class="fs20">Jadwal Perkuliahan</h1>
                </label>

                <form action="database/crud.php" method="post" enctype="multipart/form-data">
                    <div class="button-opt d-flex justify-content-between align-items-center mb-5 mx-4">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#createModal"><i class="fa-solid fa-plus"></i></button>
                        <input class="form-control m-2" type="file" id="file-jadwal" name="file-jadwal" accept=".csv">
                        <button type="submit" class="btn btn-success m-2 w-25" name="upload-csv">Upload File</button>
                        <button type="reset" class="btn btn-danger m-2">Reset</button>
                    </div>
                </form>

            </div>
            <div class="rounded shadow p-4 pb-5 m-2 d-flex flex-row">
            <?php 
                $label = "";
                $tipe = "";
                for($i = 0; $i < 4; $i++){
                    if ($i == 0){
                        $label = "Hari";
                        $tipe = "hari";
                        $filter = $hari;
                    } else if($i == 1){
                        $label = "Mata Kuliah";
                        $tipe = "mata-kuliah";
                        $filter = $matkul;
                    } else if($i == 2){
                        $label = "Dosen";
                        $tipe = "dosen";
                        $filter = $dosen;
                    } else {
                        $label = "Kelas";
                        $tipe = "kelas";
                        $filter = $kelas;
                    }
                    ?>
                    <div class="d-flex flex-column m-3 w-25">
                        <?php
                        echo "<label for='filter-$tipe'>$label</label>";
                        echo "<select  name='$tipe' id='filter-$tipe'
                        class='form-select bg-color-gray mb-3' onchange='filter(`partials/table.php`);'>";
                        echo"<option value='all'>Semua $label</option>";
                        foreach ($filter as $value) {
                            if($value == "$label") continue;
                            echo "<option value='$value'>$value</option>";
                        }?>
                        </select>
                    </div>    
                <?php }
            ?>
            </div>
            <div class="table-admin jadwal">
                <?php
                // include 'partials/table.php';
                ?>
            </div>
            
            
        </div>
    </div>
    <script src="ajax.js"></script>
</body>
</html>