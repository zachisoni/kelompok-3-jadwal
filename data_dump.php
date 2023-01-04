<?php
$array_jadwal = array( 
    "TI-1B" => array(
        "Senin" => array(
            "Pengantar Multimedia" => array("Ella", "AA302", 6),
            "Pendidikan agama dalam tik" => array("Adi", "AA302", 3),
        ),
        "Selasa" => array(
            "Pengantar Multimedia" => array("Elli", "AA302", 6),
            "Pendidikan agama dalam tik" => array("Ado", "AA302", 3),
        ),
        "Rabu" => array(
            "Pengantar Multimedia" => array("Ellu", "AA302", 6),
            "Pendidikan agama dalam tik" => array("Ada", "AA302", 3),
        )
    )
);

$array_kelas = array();
$array_hari = array();
$array_dosen = array();
$array_matkul = array();

foreach ($array_jadwal as $kelas => $value) {
    array_push($array_kelas, $kelas);
    foreach ($value as $hari => $jadwalHari) {
        array_push($array_hari, $hari);
        foreach ($jadwalHari as $matkul => $jadwal) {
            array_push($array_matkul, $matkul);
            array_push($array_dosen, $jadwal[0]);
        }
    }
}
?>