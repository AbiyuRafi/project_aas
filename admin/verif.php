<?php
require "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['verifikasi']) && ($_POST['verifikasi'] == 0 || $_POST['verifikasi'] == 1)) {
            $verifikasi = $_POST['verifikasi'];
            $query = "UPDATE datadata SET verifikasi = $verifikasi WHERE id = $id";
            if (mysqli_query($conn, $query)) {
                header("Location: data.php");
                echo '<script>alert("Donasi telah diterima.");</script>';
                exit;
            } else {
                echo "Gagal melakukan verifikasi.: " . mysqli_error($conn);
            }
        } 
    }
}
