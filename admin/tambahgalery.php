<?php
require 'header.php';
$conn = mysqli_connect("localhost", "root", "", "db_masjid");

if (isset($_POST['submit'])) {
    // Retrieve form data
    $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_error = $_FILES['gambar']['error'];

    if ($gambar_error == UPLOAD_ERR_OK) {
        $upload_dir = '../upload/galeri/';
        $upload_file = $upload_dir . basename($gambar);
        move_uploaded_file($gambar_tmp, $upload_file);
    }

    // Insert data into the database
    $sql = "INSERT INTO galeri (keterangan, gambar) 
            VALUES ('$keterangan', '$gambar')";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Data berhasil ditambah');
                window.location.href = 'galery.php';
                </script>";
    } else {
        echo "<script> alert('Data gagal ditambahkan');
                window.location.href = 'tambahgalery.php';
                </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>

    <div class="content">
        <div class="container">
            <div class="box">
                <div class="box-header">
                    Tambah Data
                </div>
                <div class="box-body">
                    <center>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Keterangan</label><br>
                                <input type="text" name="keterangan" required placeholder="Keterangan">
                            </div><br><br>
                            <center>
                                <input type="file" name="gambar" placeholder="img" class="input-control" required><br>
                            </center>
                            <input type="submit" name="submit" value="Simpan" class="btn"><br>
                        </form>
                        <button><a href="galery.php">Back</a></button>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>

</html>