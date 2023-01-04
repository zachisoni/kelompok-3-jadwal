
<?php
error_reporting(0);
session_start();



if(isset($_POST['login'])){
    $userData = [
        'username' => 'admin',
        'password' =>  '1234'
    ];
    $user = $_POST['username'];
    $pass = $_POST['password'];
        if ($user == $userData['username'] AND $pass == $userData['password']) {
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
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/94869fffad.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="partials/styles.css">
    <title>Login</title>
    <style>
        .left-side-bar{
    min-width: 50%;
 }
    .container-form{
    min-height: 100vh;
    width: 100%;
    background-color: #A2E8CF;
    padding-left: 115px;
    padding-right: 115px;
}
    .header-login{
        margin-top: 176px;
        margin-bottom: 46px;
    }
    .login-form{
        width: 461px;
        margin-left: auto;
        margin-right: auto;
    }
    .alert{
        width: 461px;
        margin-left: 135px;
        margin-right: 115px;
    }
    .btn-login {
        margin-left: 37.5%;
    }
    img.calendar-img{
        display: block;
        margin: auto;
        margin-top: 10vh;
    }
    </style>
</head>
<body>
    <div class="body-screen d-flex">
        <div class="left-side-bar">
            <img class="m-4" src="Logo-PNJ-Politeknik-Negeri-Jakarta-Terbaru-PNG.png" style="width: 70px; height: 70px" alt="">
            <img class="calendar-img" src="pngtree-calendar-icon-logo-2023-date-time-png-image_6310337.png" alt="">
        </div>

        <!-- Form Login -->
        <div class="container-form d-block">
            <h1 class="header-login text-center">Login as admin</h1>
            <?= $salah?>
            <form method=POST>
                <div class="login-form d-block mx-auto">
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                    <button type="submit" name="login" class="btn-login btn btn-primary shadow btn-success w-25">Login</button></div>
            </form>
            <!-- back button -->
            <a href="jadwal.php">
            <button type="submit" class="btn-back btn btn-primary shadow btn-success position-absolute bottom-0 my-5">
            <i class="fa-solid fa-arrow-left fa-sm me-2"></i>Back</button></div>
            </a>
        </div>  
        <!-- end of form login -->
    </div>
</body>
</html>




