<?php
require 'header.php';
if (isset($_POST['submit'])) {

    $tentang = addslashes($_POST['tentang']);

    if ($_FILES['foto-sekolah']['name'] != '') {

        $gambar = $_FILES['foto-sekolah']['name'];
        $gambar_tmp = $_FILES['foto-sekolah']['tmp_name'];
        $filesize = $_FILES['foto-sekolah']['size'];
        $gambar_error = $_FILES['foto-sekolah']['error'];
        if ($gambar_error == UPLOAD_ERR_OK) {
            $upload_dir = '../uploads/identitas/';
            $upload_file = $upload_dir . $gambar;
            move_uploaded_file($gambar_tmp, $upload_file);
            if (file_exists("../uploads/identitas/" . $_POST['foto_lama'])) {
                unlink("../uploads/identitas/" . $_POST['foto_lama']);
            }
        }
    } else {
        $gambar = $_POST['foto_lama'];
    }
    $sql = mysqli_query($conn, "UPDATE pengaturan SET 
  tentang_sekolah = '" . $tentang . "',
  foto_sekolah = '" . $gambar . "'
  WHERE id = '" . $d->id . "'");

    if ($sql) {
        echo "<script> alert('Update data berhasil')
        window.location.href = 'tentang-sekolah.php';</script>";
    } else {
        echo "<script> alert('Data gagal diupdate')
        window.location.href = 'tentang-sekolah.php';</script>"
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
                    Tentang Sekolah
                </div>
                <div class="box-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">

                            <label>Tentang Sekolah</label>
                            <textarea name="tentang" class="input-control" placeholder="Tentang Sekolah">
                            <?= $d->tentang_sekolah ?>
                            </textarea>

                            <label>Foto Sekolah</label>
                            <input type="file" name="foto-sekolah" placeholder="Foto" class="input-control"><br>
                            <center><img src="../uploads/identitas/<?= $d->foto_sekolah ?>" width="90px" class="image">
                            </center>

                            <input type="hidden" name="foto_lama" value="<?= $d->foto_sekolah ?>">
                            <input type="submit" name="submit" value="Simpan" class="btn"><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>