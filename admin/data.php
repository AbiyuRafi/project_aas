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
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .content-data {
        padding: 100px;
    }

    .container-data {
        max-width: 1200px;
        margin: 0 auto;
    }

    .box-data {
        background-color: #f5f5f5;
        border-radius: 8px;
        padding: 50px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .box-header-data {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .input-group-data {
        display: flex;
        margin-bottom: 20px;
    }

    .input-group-data input[type="text"] {
        flex: 1;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .input-group-data button {
        padding: 10px 20px;
        border-radius: 4px;
        background-color: #007bff;
        border: none;
        color: #ddd;
        cursor: pointer;
    }

    .table {
        margin-right: 10px;
        width: 102%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 5px;
        margin-right: 10px;
        border: 1px solid #ccc;
    }

    .text-color {
        color: #007bff;
        text-decoration: none;
    }

    .text-green {
        color: #28a745;
    }

    .text-red {
        color: #dc3545;
    }

    .verifikasi-select {
        padding: 5px 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
        background-color: #fff;
    }

    .verifikasi-select option {
        padding: 5px 10px;
    }
</style>

<body>
    <div class="content-data">
        <div class="container-data">
            <div class="box-data">
                <div class="box-header-data">
                    Data
                </div>
                <div class="box-body-data">
                    <a href="tambahdata.php" class="text-color"><i><i class="fa fa-plus"></i></i>Tambah Data</a>
                    <?php
                    $no = 1;
                    $where = "WHERE 1 = 1 ";
                    if (isset($_GET['key'])) {
                        $where .= "AND nama LIKE '%" . $_GET['key'] . "%'";
                    }
                    $datadata = mysqli_query($conn, "SELECT * FROM datadata ");
                    if (mysqli_num_rows($datadata) > 0) {
                    ?>
                        <table class="table" border="1" cellspacing="10" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>ID Donatur</th>
                                    <th>Paket</th>
                                    <th>Kategori</th>
                                    <th>Nominal</th>
                                    <th>Metode</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    <th>Verisikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($p = mysqli_fetch_array($datadata)) {
                                ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $p['nama'] ?></td>
                                        <td><?= $p['iddonatur'] ?></td>
                                        <td><?= $p['paket'] ?></td>
                                        <td><?= $p['kategori'] ?></td>
                                        <td><?= $p['nominal'] ?></td>
                                        <td><?= $p['metode'] ?></td>
                                        <td>
                                            <center><img src="../upload/verf/<?= $p['gambar'] ?>" alt="" width="40px"></center>
                                        </td>
                                        <td>
                                            <?php if ($p['verifikasi'] == 1) : ?>
                                                <span class="text-green">Terverifikasi</span>
                                            <?php else : ?>
                                                <span class="text-red">Belum Terverifikasi</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="editdata.php?id=<?= $p['id'] ?>" title="Update data" class="text-green"><i class="fa fa-edit"></i></a> |
                                            <a href="hapus.php?iddata=<?= $p['id'] ?>" onclick="return confirm('Yakin ingin hapus?')" title="Hapus data" class="text-red"><i class="fa fa-times"></i></a>
                                        </td>
                                        <td>
                                            <form action="verif.php?id=<?= $p['id'] ?>" method="POST">
                                                <select class="verifikasi-select" name="verifikasi">
                                                    <option value="0" <?php if ($p['verifikasi'] == 0) echo 'selected'; ?>>Belum Terverifikasi</option>
                                                    <option value="1" <?php if ($p['verifikasi'] == 1) echo 'selected'; ?>>Terverifikasi</option>
                                                </select>
                                                <button type="submit" class="text-green"><i class="fa fa-check"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    } else {
                        echo "<p>Data tidak ada</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>