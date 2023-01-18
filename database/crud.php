<?php
require_once 'config.php';
//CREATE JADWAL BY INPUT
if (isset($_POST['buat'])) {
    $slot_waktu  = $_POST['slot_waktu'];
    $hari  = $_POST['hari'];
    $mata_kuliah  = $_POST['mata_kuliah'];
    $dosen  = $_POST['dosen'];
    $ruang  = $_POST['ruang'];
    $kelas  = $_POST['kelas'];
    $jumlah_jam  = $_POST['jumlah_jam'];
    $tahun_ajaran  = $_POST['tahun_ajaran'];
    $semester  = $_POST['semester'];
    $id  = $_POST['no_jadwal'];

    $query = "INSERT INTO jadwal(slot_waktu, hari, mata_kuliah, dosen, ruang, kelas, jumlah_jam, tahun_ajaran, semester)
             VALUE('$slot_waktu', '$hari', '$mata_kuliah', '$dosen', '$ruang', '$kelas', '$jumlah_jam', '$tahun_ajaran', '$semester')";
    $result = $connectDB->query($query);
    if ($result) {
        echo "<script>alert('Jadwal berhasil ditambahkan')</script>";
    }else{
        echo "<script>alert('Terjadi Kesalahan')</script>";
    }
    header('Location:../admin_upload.php');
}
//CREATE JADWAL
if(isset($_POST['upload-csv'])){
    // Allowed mime types
    $mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate format file
    if(!empty($_FILES['file-jadwal']['name']) && in_array($_FILES['file-jadwal']['type'], $mimes)){
        
        // validasi file berhasil diupload
        if(is_uploaded_file($_FILES['file-jadwal']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $file = fopen($_FILES['file-jadwal']['tmp_name'], 'r');
            
            // Skip header
            fgetcsv($file);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($file)) !== FALSE){
                // Get row data
                $hari = $line[0];
                $slot_waktu = $line[1];
                $mata_kuliah = $line[2];
                $dosen = $line[3];
                $ruang = $line[4];
                $kelas = $line[5];
                $jumlah_jam = $line[6];
                $tahun_ajaran = $line[7];
                $semester = $line[8];
                
                $connectDB->query("INSERT INTO jadwal(hari, slot_waktu, mata_kuliah, dosen, ruang, kelas, jumlah_jam, tahun_ajaran, semester) 
                            VALUE ('".$hari."', 
                                    '".$slot_waktu."', 
                                    '".$mata_kuliah."', 
                                    '" . $dosen . "', 
                                    '" . $ruang. "',
                                    '" . $kelas. "',
                                    '" . $jumlah_jam . "',
                                    '" . $tahun_ajaran . "', 
                                    '".$semester."')");
            }
            
            // Close opened CSV file
            fclose($file);
            
            $qstring = '?status=success';
        }else{
            $qstring = '?status=error';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
    header("Location:../admin_upload.php".$qstring);
}

// UPDATE JADWAL

if (isset($_POST['ubah'])) {
    $slot_waktu  = $_POST['slot_waktu'];
    $hari  = $_POST['hari'];
    $mata_kuliah  = $_POST['mata_kuliah'];
    $dosen  = $_POST['dosen'];
    $ruang  = $_POST['ruang'];
    $kelas  = $_POST['kelas'];
    $jumlah_jam  = $_POST['jumlah_jam'];
    $tahun_ajaran  = $_POST['tahun_ajaran'];
    $semester  = $_POST['semester'];
    $id  = $_POST['no_jadwal'];
    $result = $connectDB->query('UPDATE jadwal 
                                        SET slot_waktu="' . $slot_waktu .
        '", hari="' . $hari .
        '", mata_kuliah="' . $mata_kuliah .
        '", dosen="' . $dosen .
        '", ruang="' . $ruang .
        '", kelas="' . $kelas .
        '", jumlah_jam="' . $jumlah_jam .
        '", tahun_ajaran="' . $tahun_ajaran .
        '", semester="' . $semester .
        '" WHERE id=' . $id);
        if ($result) {
            echo "<script>alert('Jadwal berhasil ditambahkan')</script>";
        }else{
            echo "<script>alert('Terjadi Kesalahan')</script>";
        }
    header('Location:../admin_upload.php');
}
// DELETE JADWAL

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $result = $connectDB->query('DELETE FROM jadwal WHERE id=' . $id);

    header('Location:../admin_upload.php');
}