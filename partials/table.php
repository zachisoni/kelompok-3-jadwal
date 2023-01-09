<?php
require_once "database/config.php";
?>

<table class="table table-bordered table-striped">
    <thead class="thead-dark text-center">
        <tr>
            <th>Hari</th>
            <th>Slot Waktu</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Ruang</th>
            <th>Kelas</th>
            <th>Durasi Kelas</th>
            <th>Tahun Ajaran</th>
            <th>Semester</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $connectDB->query('SELECT * FROM jadwal');
        $json = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $json[] = $row;
            }

            $jsonEncode = json_encode($json, JSON_PRETTY_PRINT);
            
            file_put_contents('database/data.json', $jsonEncode);
            
            $jsonDecode = json_decode(file_get_contents('database/data.json'), true);

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