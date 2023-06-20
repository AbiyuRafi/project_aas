<?php
require 'header.php';
if (isset($_POST['submit'])) {
    $nama = addslashes(ucwords($_POST['nama']));
    $alamat = addslashes($_POST['alamat']);
    $telp = addslashes($_POST['telp']);
    $gmaps = addslashes($_POST['gmaps']);

    if ($_FILES['logo_baru']['name'] != '') {

        $gambar = $_FILES['logo_baru']['name'];
        $gambar_tmp = $_FILES['logo_baru']['tmp_name'];
        $filesize = $_FILES['logo_baru']['size'];
        $gambar_error = $_FILES['logo_baru']['error'];
        if ($gambar_error == UPLOAD_ERR_OK) {
            $upload_dir = '../uploads/identitas/';
            $upload_file = $upload_dir . $gambar;
            move_uploaded_file($gambar_tmp, $upload_file);
            if (file_exists("../uploads/identitas/" . $_POST['logo_lama'])) {
                unlink("../uploads/identitas/" . $_POST['logo_lama']);
            }
        }
    } else {
        $gambar = $_POST['logo_lama'];
    }
    $sql = mysqli_query($conn, "UPDATE pengaturan SET 
  nama = '" . $nama . "',
  alamat = '" . $alamat . "',
  telepon = '" . $telp . "',
  google_maps = '" . $gmaps . "',
  logo = '" . $gambar . "'
  WHERE id = '" . $d->id . "'");

    if ($sql) {
        echo "<script> alert('Update data berhasil')
        window.location.href = 'identitas-sekolah.php';</script>";
    } else {
        echo "<script> alert('Data gagal diupdate')
        window.location.href = 'identitas-sekolah.php';</script>"
            . mysqli_error($conn);
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
                    Identitas Sekolah
                </div>
                <div class="box-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Sekolah" value="<?= $d->nama ?>" class="input-control" required><br>

                            <label>Alamat</label>
                            <textarea name="alamat" class="input-control" placeholder="Alamat"><?= $d->alamat ?>
                            </textarea>

                            <label>Telepon</label>
                            <input type="text" name="telp" placeholder="Telepon Sekolah" value="<?= $d->telepon ?>" class="input-control" required><br>

                            <label>Google Maps</label>
                            <textarea name="gmaps" class="input-control" placeholder="Google Mapas"><?= $d->google_maps ?>
                            </textarea>

                            <label>Logo</label>
                            <input type="file" name="logo_baru" placeholder="Gambar" class="input-control"><br>
                            <center><img src="../uploads/identitas/<?= $d->logo ?>" width="80px" class="image">
                            </center>
                            <input type="hidden" name="logo_lama" value="<?= $d->logo ?>">


                            <input type="submit" name="submit" value="Simpan" class="btn"><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>