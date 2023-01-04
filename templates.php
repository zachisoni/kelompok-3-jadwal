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
    $displayDay = true;
    echo"<table class='table table-bordered border-secondary table-jadwal' id='table-jadwal-".current($jadwal)['val6']."'>";
    foreach($jadwal as $row){
        if($row['val6'] == next($jadwal)['val6'] && $row != $jadwal[0]){
            echo "<tr>";
            foreach ($row as $key => $col) {
                $span = 1;
                echo "<td>$col</td>";
            }
            echo "</tr>";
        } else if(key($jadwal) == null){
            echo "</table>";
        } else {
            echo "</table>";
            echo "<h2 class='text-center'>".current($jadwal)['val6']."</h2>";
            echo"<table class='table table-bordered border-secondary table-jadwal' id='table-jadwal-".current($jadwal)['val6']."'>";
            ?>
            <tr class="table-dark text-center sticky-top m-0">
                <?php
                foreach ($jadwal[0] as $head ) {
                    echo "<th>$head</th>";
                }
                ?>
            </tr>
            <?php
        }
    }
}

?>
