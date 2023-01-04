<?php
    session_start();
    if ($_SESSION['berhasil'] == false) {
        header('Location: login_view.php');
        die();
    }

?>

<!DOCTYPE html>
<html lang="en">
<?php $title='Dashboard Admin'; include 'partials/head.php' ?>
<body>
    <div class="main-container d-flex">
        <?php $isActive='unggah-jadwal';
        include "partials/sidebar.php"?>
        <div class="content">
            <div class="file-input m-5 position-absolute start-50 translate-middle text-center " style="width: 35%;">
            <form action="admin_upload.php" method="post">
                    <label for="formFile" class="form-label mb-4"><h1 class="fs20">Upload Data Jadwal Perkuliahan</h1></label>
                    <input class="form-control" type="file" id="file-jadwal" name="file-jadwal"  accept=".xls,.xlsx">
                    <div class="button-opt d-flex my-4 justify-content-center">
                    <button type="submit" class="btn btn-success me-3" name="upload">Upload File</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
                
                    <?php
                    $file = $_POST['file-jadwal'] ?? null;
                    
                    if (isset($_POST['upload'])) {
                        if (empty($file)) {
                            echo '<div class="alert alert-danger fw-bold" role="alert">';
                            echo $_POST['file-jadwal'] . ' <span class="fw-normal">Gagal mengunggah file</span>';                            
                            echo    '</div>';
                            die();
                        }else{
                            echo '<div class="alert alert-success fw-bold" role="alert">';
                            echo $_POST['file-jadwal'] . ' <span class="fw-normal">Berhasil diunggah</span>';                            
                            echo    '</div>';
                        }
                    }
                    ?>
            </div>
            
        </div>
    </div>
</body>
</html>
