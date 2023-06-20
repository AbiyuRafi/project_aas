<?php
include "connect.php";
session_start();

if (isset($_SESSION["username"])) {
    echo "<script>window.location.href = 'admin/index.php';</script>";
}

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        echo "<script>alert('Anda berhasil login');
        window.location.href = 'admin/index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Username atau password salah');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #001E42;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #f5f5f5;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 20px;
        width: 400px;
    }

    .container h3 {
        font-size: 24px;
        font-weight: bold;
        margin-top: 10px;
        text-align: center;
        margin-bottom: 20px;
        color: #001E42;
    }

    .container input[type="text"],
    .container input[type="password"] {
        width: 100%;
        padding: 15px;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        color: #001E42;
    }

    .container input[type="submit"] {
        background-color: #FFF500;
        margin-top: 15px;
        color: #001E42;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }
</style>

<body>
    <div class="container">
        <center>
            <img src="upload/index/unnamed 1.png" alt="">
        </center>
        <form action="" method="post">
            <h3>Login</h3>
            <input type="text" name="username" required placeholder="Username" autocapitalize="off"><br>
            <input type="password" name="password" required placeholder="Password"><br>
            <input type="submit" name="submit" value="Login" class="form-btn">
        </form>
    </div>
</body>

</html>