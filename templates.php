<?php
function filterSection(array $hari, array $matkul, array $dosen, array $kelas){
    $filter = array();
    ?>
    <div class="rounded shadow p-4 pb-5 mx-2 w-25 h-100 sticky-top">
        <h2 class="fs-5 my-3">Filters</h2>
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
                echo "<label for='filter-$tipe'>$label</label>";
                echo "<select  name='$tipe' id='filter-$tipe'
                        class='form-select bg-color-gray mb-3'>";
                echo"<option value='all'>Semua $label</option>";
                foreach ($filter as $value) {
                    if($value == "$label") continue;
                    echo "<option value='$value'>$value</option>";
                }
                
                echo "</select>";
            }
        ?>
        <!-- <input type="submit" name="filter" value="Filter" class="btn btn-primary"> -->
        <button class="btn btn-primary" onclick="search()">Filter</button>
    </div>
    <?php
}

function table(array $jadwal){
    for($i = 0; $i < sizeof($jadwal); $i++){
        if($jadwal[$i]['kelas'] != $jadwal[$i - 1]['kelas']){
            ?>
            </table>
            <table class='table table-bordered border-secondary table-jadwal'>
            <thead class="thead-dark text-center sticky-top table-dark">
                <tr>
                    <td colspan="8"><?= $jadwal[$i]['kelas'];?></td>
                </tr>
                <tr>
                    <th>Hari</th>
                    <th>Slot Waktu</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Ruang</th>
                    <th>Durasi Kelas</th>
                    <th>Tahun Ajaran</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <?php
        }
        ?>
        <tr>
            <td><?= $jadwal[$i]['hari']; ?></td>
            <td><?= $jadwal[$i]['slot_waktu'];?></td>
            <td><?= $jadwal[$i]['mata_kuliah']; ?></td>
            <td><?= $jadwal[$i]['dosen']; ?></td>
            <td><?= $jadwal[$i]['ruang']; ?></td>
            <td><?= $jadwal[$i]['jumlah_jam']; ?></td>
            <td><?= $jadwal[$i]['tahun_ajaran']; ?></td>
            <td><?= $jadwal[$i]['semester']; ?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
}

?>
