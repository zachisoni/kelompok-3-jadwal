<?php
    include 'connection.php';
    error_reporting(0);
    session_start();

    if(isset($_SESSION['username'])){
        header("Location: login_success.php");
    }

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_quey($connlogin, $sql);
        if($result -> num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: login_success.php");
        }else{
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
        <link rel="stylesheet" href="font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="alert alert-warning" role="alert">
            <?php echo $_SESSION['error']?>
        </div>

        <div class="container">
            <form action="hasil.php" method="POST" class="login-username">
                <p class="login-text" style="font-size: 2rem; font-weight:800">Login</p>
                <div class="input-group">
                    <input type="username" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                </div>

                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['$password']; ?>" required>
                </div>

                <div class="input-group">Captcha<br>
                    <img src="gambar.php" alt="image" />
                </div><br>

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