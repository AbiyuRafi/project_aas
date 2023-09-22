<?php
require 'header.php';

if (isset($_POST['submit'])) {
    $nama = addslashes(ucwords($_POST['nama']));
    $iddonatur = mysqli_real_escape_string($conn, $_POST['iddonatur']);
    $paket = mysqli_real_escape_string($conn, $_POST['paket']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $nominal = mysqli_real_escape_string($conn, $_POST['nominal']);

    if ($_FILES['gambar']['name'] != '') {
        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_error = $_FILES['gambar']['error'];

        if ($gambar_error == UPLOAD_ERR_OK) {
            $upload_dir = '../upload/verf/';
            $upload_file = $upload_dir . $gambar;
            move_uploaded_file($gambar_tmp, $upload_file);

            if (file_exists("../upload/verf/" . $_POST['gambar2'])) {
                unlink("../upload/verf/" . $_POST['gambar2']);
            }
        }
    } else {
        echo 'Gambar gagal diganti';
        $gambar = $_POST['gambar2'];
    }

    $sql = mysqli_query($conn, "UPDATE datadata SET 
nama = '" . $nama . "',
iddonatur = '" . $iddonatur . "',
paket = '" . $paket . "',
kategori = '" . $kategori . "',
nominal = '" . $nominal . "',
gambar = '" . $gambar . "'
WHERE id = '" . $_GET['id'] . "'");

    if ($sql) {
        echo "<script> alert('Update data berhasil');
        window.location.href = 'data.php';</script>";
    } else {
        echo "<script> alert('Data gagal diupdate');
        window.location.href = 'editdata.php';</script>" . mysqli_error($conn);
    }
}

$data = mysqli_query($conn, "SELECT * FROM datadata WHERE id = '" . $_GET['id'] . "'");
if (mysqli_num_rows($data) == 0) {
    echo "<script> alert('Data tidak ada');
            window.location.href = 'data.php';</script>";
}
$p = mysqli_fetch_object($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="box">
                <div class="box-header">
                    Edit Data
                </div>
                <div class="box-body">
                    <center>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label><br>
                                <input type="text" name="nama" required placeholder="Masukkan Nama Anda" value="<?= $p->nama ?>"><br>
                                <label>ID</label><br>
                                <input type="text" name="iddonatur" required placeholder="ID" value="<?= $p->iddonatur ?>"><br>
                                <label>Pilihan Paket</label><br>
                                <select name="paket" id="paket">
                                    <option value="Paket 1" <?= ($p->paket == 'Paket 1') ? 'selected' : '' ?>>Paket 1</option>
                                    <option value="Paket 2" <?= ($p->paket == 'Paket 2') ? 'selected' : '' ?>>Paket 2</option>
                                </select><br>
                                <label>Pilihan Kategori</label><br>
                                <select name="kategori" id="kategori">
                                    <option value="Barang" <?= ($p->kategori == 'Barang') ? 'selected' : '' ?>>Barang</option>
                                    <option value="Uang" <?= ($p->kategori == 'Uang') ? 'selected' : '' ?>>Uang</option>
                                </select><br>
                                <label>Nominal</label><br>
                                <input type="text" name="nominal" required placeholder="Masukkan Nominal" value="<?= $p->nominal ?>"><br><br>
                            </div>
                    </center>
                    <center>
                        <input type="file" name="gambar" placeholder="Bukti Pembayaran" class="input-control" required><br>
                    </center>
                    <img src="../upload/verf/<?= $p->gambar ?>" width="40%" class="image">
                    <input type="hidden" name="gambar2" value="<?= $p->gambar ?>">
                    <input type="submit" name="submit" value="Simpan" class="btn"><br>
                    </form>
                    <button><a href="data.php">Back</a></button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>