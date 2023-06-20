<?php
include "header.php";

$verifikasi = 1;

$total_donasi = 0;
$jumlah_donatur = 0;
$persentase = 0;
$bar_width = 0;
$target_donasi = 40000000;

if ($verifikasi) {
    $sql = "SELECT SUM(REPLACE(nominal, '.', '')) AS total_donasi, COUNT(*) AS jumlah_donatur FROM datadata";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_donasi = $row["total_donasi"];
        $jumlah_donatur = $row["jumlah_donatur"];
    }

    $persentase = ($total_donasi / $target_donasi) * 100;

    $bar_width = $persentase * 3;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .progress-bar {
            width: 100%;
            height: 35px;
            background-color: #f2f2f2;
            border-radius: 5px;
            margin-bottom: 10px;
            position: relative;
        }

        .progress {
            height: 100%;
            width: 100%;
            border-radius: 5px;
            background-color: #22387b;
            transition: width 0.3s ease-in-out;
        }

        .percentage {
            position: absolute;
            top: 0;
            right: 5px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 5px;
            font-weight: bold;
            color: #1F3984;
        }

        .progress2 {
            background-color: #1F3984;
            width: 100%;
            height: 45px;
            border-radius: 5px;
            padding-top: 15px;
            margin-top: 40px;
            color: #fff;
        }

        .total {
            border-radius: 10px;
            width: 93%;
            height: 100px;
            list-style: none;
            margin-inline-start: 30px;
            padding-top: 35px;
            display: flex;
            justify-content: space-between;
            line-height: 200%;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="box">
                <div class="box-header">
                    Donatur
                </div>
                <div class="box-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Target</th>
                                <th>Total Dana Terkumpul</th>
                                <th>Total Donatur</th>
                                <th>Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Rp. <?= number_format($target_donasi, 0) ?></th>
                                <th>Rp. <?= number_format($total_donasi, 0) ?></th>
                                <th><?= $jumlah_donatur ?> Donatur</th>
                                <th><?= number_format($persentase, 2) ?> %</th>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="progress-bar">
                                        <div class="progress" style="width: <?= $bar_width ?>%;"></div>
                                        <div class="percentage"><?= number_format($persentase, 2) ?>%</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>