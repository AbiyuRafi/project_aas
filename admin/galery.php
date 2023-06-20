<?php
include 'header.php';
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
                   Galery
                </div>
                <div class="box-body">
                    <a href="tambahgalery.php" class="text-color"><i><i class="fa fa-plus"></i></i>Tambah Data</a>
                    <form action="">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Pencarian">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $where = "WHERE 1 = 1 ";
                            if (isset($_GET['key'])) {
                                $where .= "AND keterangan LIKE '%" . $_GET['key'] . "%'";
                            }
                            $datadata = mysqli_query($conn, "SELECT * FROM galeri $where ORDER BY id DESC");
                            if (mysqli_num_rows($datadata) > 0) {
                                while ($p = mysqli_fetch_array($datadata)) {
                            ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?=$p['keterangan']?></td>

                                        <td>
                                            <center><img src="../upload/galeri/<?= $p['gambar'] ?>" alt="" width="40px"></center>
                                        </td>
                                        <td>
                                            <a href="editgalery.php?id=<?= $p['id'] ?>" title="Update Galery" class="text-green"><i class="fa fa-edit"></i></a> |
                                            <a href="hapus.php?idgaleri=<?= $p['id'] ?>" onclick="return confirm('Yakin ingin hapus?')" title="Hapus data" class="text-red"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                            ?>
                                <tr>
                                    <td colspan="6">Data tidak ada</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
