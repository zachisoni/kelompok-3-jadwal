<?php
require_once "database/config.php";
?>

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Slot Waktu</th>
            <th>Hari</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Ruang</th>
            <th>Kelas</th>
            <th>Durasi Kelas</th>
            <th>Tahun Ajaran</th>
            <th>Semester</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $connectDB->query('SELECT * FROM jadwal');
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
        ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['slot_waktu']; ?></td>
            <td><?= $row['hari']; ?></td>
            <td><?= $row['mata_kuliah']; ?></td>
            <td><?= $row['dosen']; ?></td>
            <td><?= $row['ruang']; ?></td>
            <td><?= $row['kelas']; ?></td>
            <td><?= $row['jumlah_jam']; ?></td>
            <td><?= $row['tahun_ajaran']; ?></td>
            <td><?= $row['semester']; ?></td>
        </tr>
        <?php
            }
        } else {
            ?>
        <tr>
            <td colspan="10" class="text-center">Belum ada Jadwal </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>