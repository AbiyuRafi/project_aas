<?php
require 'header.php';
$conn = mysqli_connect("localhost", "root", "", "db_masjid");

if (isset($_POST['submit'])) {
    // Retrieve form data
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $iddonatur = mysqli_real_escape_string($conn, $_POST['iddonatur']);
    $paket = mysqli_real_escape_string($conn, $_POST['paket']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $nominal = mysqli_real_escape_string($conn, $_POST['nominal']);
    $metode = mysqli_real_escape_string($conn, $_POST['metode']);

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_error = $_FILES['gambar']['error'];

    if ($gambar_error == UPLOAD_ERR_OK) {
        $upload_dir = '../upload/verf/';
        $upload_file = $upload_dir . basename($gambar);
        move_uploaded_file($gambar_tmp, $upload_file);
    }

    // Insert data into the database
    $sql = "INSERT INTO datadata (nama, iddonatur, paket, kategori, nominal, gambar,metode) 
            VALUES ('$nama', '$iddonatur', '$paket', '$kategori', '$nominal', '$gambar','$metode')";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Data berhasil ditambah');
                window.location.href = 'data.php';
                </script>";
    } else {
        echo "<script> alert('Data gagal ditambahkan');
                window.location.href = 'tambahdata.php';
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
                                <label>Metode Pembayaran</label>
                                <select name="metode" id="">
                                    <option value="bank">Transfer bank</option>
                                    <option value="ewallet">E-wallet</option>
                                    <option value="tunai">Tunai</option>
                                </select>
                            </div>
                    </center>
                    <center>
                        <input type="file" name="gambar" placeholder="Bukti Pembayaran" class="input-control" required><br>
                    </center>
                    <input type="submit" name="submit" value="Simpan" class="btn"><br>
                    </form>
                    <button><a href="data.php">Back</a></button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



    