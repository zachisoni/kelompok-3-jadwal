<?php
error_reporting(0);
session_start();

if (isset($_POST['login'])) {
    $userData = [
        'username' => 'admin',
        'password' =>  '1234'
    ];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user == $userData['username'] and $pass == $userData['password']) {
        session_start();
        $_SESSION['berhasil'] = true;
        header("Location: admin_upload.php");
    } else {
        $salah = "<div class='alert alert-danger' role='alert'>Username atau password salah!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php 
$title = "Login";
include "partials/head.php";
?>
<style>
    .left-side-bar {
        min-width: 50%;
    }

    .container-form {
        min-height: 100vh;
        width: 100%;
        background-color: #A2E8CF;
        padding-left: 115px;
        padding-right: 115px;
    }

    .header-login {
        margin-top: 176px;
        margin-bottom: 46px;
    }

    .login-form {
        width: 461px;
        margin-left: auto;
        margin-right: auto;
    }

    .alert {
        width: 461px;
        margin-left: 135px;
        margin-right: 115px;
    }

    .btn-login {
        margin-left: 37.5%;
    }

    img.calendar-img {
        display: block;
        margin: auto;
        margin-top: 10vh;
    }
</style>

<body>
    <div class="body-screen d-flex">
        <div class="left-side-bar">
            <img class="m-4" src="Logo-PNJ-Politeknik-Negeri-Jakarta-Terbaru-PNG.png" style="width: 70px; height: 70px"
                alt="">
            <img class="calendar-img" src="pngtree-calendar-icon-logo-2023-date-time-png-image_6310337.png" alt="">
        </div>

        <!-- Form Login -->
        <div class="container-form d-block">
            <h1 class="header-login text-center">Login as admin</h1>
            <?= $salah ?>
            <form method=POST>
                <div class="login-form d-block mx-auto">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" name="login"
                        class="btn-login btn btn-primary shadow btn-success w-25">Login</button>
                </div>
            </form>
            <!-- back button -->
            <a href="index.php">
                <button type="submit"
                    class="btn-back btn btn-primary shadow btn-success position-absolute bottom-0 my-5">
                    <i class="fa-solid fa-arrow-left fa-sm me-2"></i>Back</button>
        </div>
        </a>
    </div>
    <!-- end of form login -->
    </div>
</body>

</html>