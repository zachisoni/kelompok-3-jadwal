<?php
session_start();
if ($_SESSION['berhasil'] == false) {
    header('Location: login.php');
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

                <form action="database/crud.php" method="post" enctype="multipart/form-data">
                    <div class="button-opt d-flex justify-content-between align-items-center d-flex">
                        <input class="form-control m-2" type="file" id="file-jadwal" name="file-jadwal" accept=".csv">
                        <button type="submit" class="btn btn-success m-2 w-25" name="upload-csv">Upload File</button>
                        <button type="reset" class="btn btn-danger m-2">Reset</button>
                    </div>
                </form>

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