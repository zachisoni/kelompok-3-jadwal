<!DOCTYPE html>
<html>
    <head>
        <title>Cek Hasil Captcha</title>
    </head>
    <body>
        <p align="center">Hasil Login
        <?php
            session_start();
            if($_SESSION["Captcha"] != $_GET["nilaiCaptcha"]){
                echo "Username anda " .$_GET["username"]; echo "<br>";
                echo "Password anda " .$_GET["password"]; echo "<br>";
                echo "Kode Captcha Anda salah";
            }else{
                echo "Username anda " .$_POST["username"]; echo "<br>";
                echo "Password anda " .$_POST["password"]; echo "<br>";
                echo "Kode Captcha Anda benar";
            }
        ?>
        </p>
    </body>
</html>