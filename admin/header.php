<?php

session_start();
require '../connect.php';

 if ($_SESSION['username'] == '') {
    echo "<script>window.location.href = '../login.php';</script>";
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wk</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


</head>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>

<body>
    <div class="navbar">

        <div class="container">
            <h2 class="nav-brand">Smk Wikrama Bogor</h2>

            <ul class="nav-menu">
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="donatur.php">Total Donatur</a></li>
                <li><a href="data.php">Data Donatur</a></li>
                <li><a href="galery.php">Galery</a></li>
                <li><a href="Pesan.php">Pesan</a></li>
                <li><a href="logout.php">Logout</a></li>
                </li>
            </ul>
        </div>
    </div>
    </div>
</body>

</html>