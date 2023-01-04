<?php 
function filterSection(array $hari, array $matkul, array $dosen, array $kelas){
    $filter = array();
    ?>
    <form class="rounded shadow p-4 pb-5 mx-2 w-25 h-100 sticky-top" method="POST" action="jadwal.php">
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
                echo "<select  name='filter-$tipe' id='filter-$tipe'
                        class='form-select bg-color-gray mb-3'>";
                echo"<option value='semua-$tipe'>Semua $label</option>";
                foreach ($filter as $value) {
                    if($value == "$label") continue;
                    echo "<option value='$value'>$value</option>";
                }
                
                echo "</select>";
            }
        ?>
        </form>
        <?php
}

function table(array $jadwal){
    echo"<table class='table table-bordered border-secondary' id='table-jadwal'>";
    ?>
    <tr class="table-dark text-center sticky-top m-0">
        <?php
        foreach ($jadwal[0] as $head ) {
            echo "<th>$head</th>";
        }
        ?>
    </tr>
    <?php
    $displayDay = true;
    foreach($jadwal as $row){
        if($row != $jadwal[0]){
        ?>
        <tr>
            <?php
            foreach ($row as $col) {
                $span = 1;
                echo "<td>$col</td>";
            }
            ?>
        </tr>
        <?php
        }
    }
    echo "</table>";
}

?>
