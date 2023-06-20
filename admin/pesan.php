<?php
require "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="box">
                <div class="box-header">
                    kontak
                </div>
                <div class="box-body">
                    <?php
                    $no = 1;
                    $where = "WHERE 1 = 1 ";
                    $kontak = mysqli_query($conn, "SELECT * FROM kontak ");
                    if (mysqli_num_rows($kontak) > 0) {
                    ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Saran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($p = mysqli_fetch_array($kontak)) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $p['nama'] ?></td>
                                        <td><?= $p['email'] ?></td>
                                        <td><?= $p['pesan'] ?></td>
                                        <td><a href="hapus.php?idpesan=<?= $p['id'] ?>" onclick="return confirm('Yakin ingin hapus?')" title="Hapus data" class="text-red"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    } else {
                        echo "Tidak ada data kontak.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>