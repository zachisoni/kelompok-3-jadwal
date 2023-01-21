<?php
require_once "../database/config.php";

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$limit = 5;
$offset = ($pageno - 1) * $limit;
?>

<table class="table table-bordered table-striped">
    <thead class="thead-dark table-dark text-center sticky-top">
        <tr>
            <th>Hari</th>
            <th style="width:15%;">Slot Waktu</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Ruang</th>
            <th>Kelas</th>
            <th>Durasi Kelas</th>
            <th style="width: 15%;">Tahun Ajaran</th>
            <th>Semester</th>
            <th style="width: 10%;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $connectDB->query('SELECT * FROM jadwal;');
        $json = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $json[] = $row;
            }

            $jsonEncode = json_encode($json, JSON_PRETTY_PRINT);
            
            file_put_contents('../database/data.json', $jsonEncode);
            
            $jsonDecode = json_decode(file_get_contents('../database/data.json'), true);

            $total_item = count($jsonDecode);
            $total_pages = ceil($total_item / $limit);
            $jsonDecode = array_splice($jsonDecode, $offset, $limit);

            if($_GET['k'] != "all"){
                $jsonDecode = array_filter($jsonDecode, function($value){
                    return $value['kelas'] == $_GET['k'];
                });
            }
            if($_GET['h'] != "all"){
                $jsonDecode = array_filter($jsonDecode, function($value){
                    return $value['hari'] == $_GET['h'];
                });
            }
            if($_GET['m'] != "all"){
                $jsonDecode = array_filter($jsonDecode, function($value){
                    return $value['mata_kuliah'] == $_GET['m'];
                });
            }
            if($_GET['d'] != "all"){
                $jsonDecode = array_filter($jsonDecode, function($value){
                    return $value['dosen'] == $_GET['d'];
                });
            }

            foreach ($jsonDecode as $data) {
        ?>
        <tr>
            <td><?= $data['hari']; ?></td>
            <td><?= $data['slot_waktu']; ?></td>
            <td><?= $data['mata_kuliah']; ?></td>
            <td><?= $data['dosen']; ?></td>
            <td><?= $data['ruang']; ?></td>
            <td><?= $data['kelas']; ?></td>
            <td><?= $data['jumlah_jam']; ?></td>
            <td><?= $data['tahun_ajaran']; ?></td>
            <td><?= $data['semester']; ?></td>
            <td class="text-center">
                <i class="fa-regular fa-pen-to-square text-success fa-xl" style="cursor: pointer;" id="edit"
                    data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $data['id'] ?>"
                    data-slot-waktu="<?= $data['slot_waktu'] ?>" data-hari="<?= $data['hari'] ?>"
                    data-mata-kuliah="<?= $data['mata_kuliah'] ?>" data-dosen="<?= $data['dosen'] ?>"
                    data-ruang="<?= $data['ruang'] ?>" data-kelas="<?= $data['kelas'] ?>"
                    data-jumlah-jam="<?= $data['jumlah_jam'] ?>" data-tahun-ajaran="<?= $data['tahun_ajaran'] ?>"
                    data-semester="<?= $data['semester'] ?>"></i>

                <i class="fa-regular fa-trash-can text-danger fa-xl ms-3" id="delete" style="cursor: pointer;"
                    data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $data['id'] ?>"></i>
            </td>
        </tr>
        <?php
            }
        } else {
            ?>
        <tr>
            <td colspan=" 10" class="text-center">Belum ada Jadwal
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
require 'modals.php';
?>
<ul class="pagination justify-content-center mx-auto">
    <?php
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i != $pageno) {
        echo "<li> <a class = 'p-3 btn border border-dark m-2 pagination' onclick='changePage($i, `partials/table.php`)'>$i</a> </li>";
        } else {
        echo "<li> <a class = 'p-3 btn text-primary border border-primary m-2' href='#'>$i</a> </li>";
         }
    } ?>
</ul> 