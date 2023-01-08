<?php
session_start();
if ($_SESSION['berhasil'] == false) {
    header('Location: login_view.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php $title = 'Dashboard Admin';
include 'partials/head.php' ?>

<body>
    <div class="main-container d-flex">
        <?php $isActive = 'unggah-jadwal';
        include "partials/sidebar.php" ?>
        <div class="content">
            <div class="file-input position-absolute start-50 translate-middle text-center" style="width: 50%;">
                <label for="formFile" class="form-label mb-4">
                    <h1 class="fs20">Jadwal Perkuliahan</h1>
                </label>

                <form action="admin_upload.php" method="post">
                    <div class="button-opt d-flex justify-content-between align-items-center">
                        <input class="form-control" type="file" id="file-jadwal" name="file-jadwal" accept=".csv">
                        <button type="submit" class="btn btn-success" name="upload">Upload File</button>
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
                    } else {
                        echo '<div class="alert alert-success fw-bold" role="alert">';
                        echo $_POST['file-jadwal'] . ' <span class="fw-normal">Berhasil diunggah</span>';
                        echo    '</div>';
                    }
                }
                ?>
            </div>

            <div class="table-admin ">
                <?php
                include 'partials/table.php';
                ?>
            </div>
        </div>
    </div>
</body>

</html>