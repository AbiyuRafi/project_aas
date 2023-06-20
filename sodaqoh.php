<?php
require "connect.php";

if (isset($_POST['submit'])) {

    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $iddonatur = mysqli_real_escape_string($conn, $_POST['iddonatur']);
    $paket = mysqli_real_escape_string($conn, $_POST['paket']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $nominal = mysqli_real_escape_string($conn, $_POST['nominal']);
    $metode = mysqli_real_escape_string($conn, $_POST['metode']);

    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_error = $_FILES['gambar']['error'];

    if ($gambar_error == UPLOAD_ERR_OK) {
        $upload_dir = 'upload/verf/';
        $upload_file = $upload_dir . basename($gambar);
        move_uploaded_file($gambar_tmp, $upload_file);
    }

    $verifikasi = 0;

    $sql = "INSERT INTO datadata (nama, iddonatur, paket, kategori, nominal, gambar, metode, verifikasi) 
            VALUES ('$nama', '$iddonatur', '$paket', '$kategori', '$nominal', '$gambar', '$metode', $verifikasi)";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Terimakasih Telah Berdonasi. Mohon tunggu untuk kami verifikasi.');
                window.location.href = 'index.php';
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
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="content-sodaqoh">
        <div class="container-sodaqoh">
            <div class="box-sodaqoh">
                <div class="box-header-sodaqoh">
                    Donasi Shodaqoh
                </div>
                <div class="box-body-sadaqoh">
                    <center>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label><br>
                                <input type="text" name="nama" required placeholder="Masukan Nama Anda"><br>
                                <label>ID</label><br>
                                <input type="text" name="iddonatur" required placeholder="ID"><br>
                                <label>Pilihan Paket</label><br>
                                <select name="paket" id="paket">
                                    <option value="Paket 1">Paket 1</option>
                                    <option value="Paket 2">Paket 2</option>
                                </select><br>
                                <label>Pilihan Kategori</label><br>
                                <select name="kategori" id="kategori">
                                    <option value="Barang">Barang</option>
                                    <option value="Uang">Uang</option>
                                </select><br>
                                <label>Nominal</label><br>
                                <input type="text" name="nominal" required placeholder="Masukan Nominal"><br><br>
                                <label>Metode Pembayaran</label><br>
                                <select name="metode" id="">
                                    <option value="bank">Transfer bank</option>
                                    <option value="ewallet">E-wallet</option>
                                    <option value="tunai">Tunai</option>
                                </select>
                            </div>
                    </center>
                    <center><br>
                        <input type="file" name="gambar" placeholder="Bukti Pembayaran" class="input-control" required><br>
                    </center>
                    <div class="btn-shodaqoh">
                        <button type="submit" name="submit">Submit</button>
                    </div>
                    </form>
                    <a href="index.php">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>