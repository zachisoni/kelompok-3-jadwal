<?php
    include 'connection.php';
    error_reporting(0);
    session_start();

    // if(isset($_SESSION['username'])){
    //     header("Location: admin_upload.php");
    // }

    unset($_SESSION['error']);
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connlogin, $sql);
        if($result -> num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['berhasil'] = true;
            header("Location: admin_upload.php");
        // }else if($_SESSION["Captcha"] != $_POST["nilaiCaptcha"]){
        //     echo "<script>alert('Captcha salah/ Silahkan masukkan angka yang sesuai dengan gambar.')</script>";
        }else{
            $_SESSION['error'] = "Username atau password Anda salah. Silakan coba lagi.";
            echo "<script>alert('Username atau password Anda salah. Silakan coba lagi.')</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="alert alert-warning fixed-top" role="alert">
            <?php echo $_SESSION['error']?>
        </div>

        <div class="container pt-3">
            <a href="index.php" class="btn-close" aria-label="Close"></a>
            <form method="POST" class="login-username">
                <p class="login-text" style="font-size: 2rem; font-weight:800">Login</p>
                <div class="input-group">
                    <input type="username" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                </div>

                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['$password']; ?>" required>
                </div>

                <div class="input-group d-flex flex-column">Captcha<br>
                    <img src="gambar.php" alt="image" />
                </div>

                <div class="input-group">
                    <input name="nilaiCaptcha" placeholder="Isikan Captcha" value="" maxlength="6"/>
                </div>

                <div class="input-group">
                    <button name="submit" class="btn">Login</button>
                </div>

                    <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
            </form>
        </div>
    </body>
</html>