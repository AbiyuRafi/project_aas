<?php
require "connect.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Smk Wikrama Bogor</title>
    <link href='https://fonts.googleapis.com/css?family=Epilogue' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Be Vietnam Pro' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>

</style>

<body>

    <header class="header">
        <img src="upload/index/logo.png">
        <a href="#" class="logo"><b>Smk Wikrama Bogor</b></a>

        <nav class="navbar">
            <a href="#beranda" class="active">Beranda</a>
            <a href="#carawakaf">Cara Wakaf</a>
            <a href="#datawakaf">Data Wakaf</a>
            <a href="#galery">Galery</a>
            <a href="https://smkwikrama.sch.id/" target="_blank">Web Wikrama</a>
        </nav>
    </header>
    <section class="Beranda">
        <div class="container-beranda">
            <section class="main" id="beranda">
                <div class="balapi">
                    <p class="balap">Masjid Besar SMK Wikrama Bogor</p>
                    <h1 class="balap1">Mari <span>Tingkatkan</span> <br> <span>Keimanan </span>Masyarakat <br> SMK
                        Wikrama
                        Bogor. </h1>
                </div>
                <div class="balapin">
                    <img src="upload/index/Rectangle 1.png" alt="">
                </div>
                <img class="gambarsamping" src="upload/index/bulet.png" alt="">
                <img class="gambarkecil" src="upload/index/samping1.png" alt="">

                <a class="but" href="sodaqoh.php">Beri Bantuan Shodaqoh</a>
            </section><br><br><br>
        </div>
        <!-- <?php
        $verifikasi = 1;
        $target_donasi = 40000000;

        if ($verifikasi) {
            $sql = "SELECT SUM(REPLACE(nominal, '.', '')) AS total_donasi, COUNT(*) AS jumlah_donatur FROM datadata";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $total_donasi = $row["total_donasi"];
            $jumlah_donatur = $row["jumlah_donatur"];

            $persentase = ($total_donasi / $target_donasi) * 100;
            $bar_width = $persentase * 3;
        }

        function formatRupiah($angka)
        {
            return "Rp " . number_format($angka, 0);
        }

        function displayDonatur($conn)
        {
            $sql = "SELECT nama, nominal FROM datadata";
            $result = mysqli_query($conn, $sql);
            $donaturText = '';

            while ($row = mysqli_fetch_assoc($result)) {
                $donaturText .= $row['nama'] . " - Uang: " . formatRupiah($row['nominal']) . " ";
            }

            return $donaturText;
        }
        ?> -->

        <div class="content2">
            <div class="kotak">
                <p>
                <div class="total">
                    <li>Total Target Dana<br>
                        <h2><?= formatRupiah($target_donasi) ?></h2>
                    </li>
                    <li>Total Dana Terkumpul<br>
                        <h2><?= formatRupiah($total_donasi) ?></h2>
                    </li>
                    <li>Total Donatur<br>
                        <h2><?= $jumlah_donatur ?> Donatur</h2>
                    </li>
                </div>
                </p>
                <hr><br>
                <tr>
                    <td colspan="4">
                        <div class="progress-bar">
                            <div class="progress" style="width: <?= $bar_width ?>%;"></div>
                            <div class="percentage"><?= number_format($persentase, 2) ?>%</div>
                        </div>
                    </td>
                </tr>
                <div class="progress2">
                    <div class="text-berjalan">
                        <marquee direction="right">
                            <?= displayDonatur($conn) ?>
                        </marquee>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="container-slide">
            <h1>Infor<span>masi</span></h1>
            <div class="slide-wrapper">
                <div class="slide-box mySwiper">
                    <div class="slide-content swiper-wrapper">
                        <div class="slide swiper-slide">
                            <img src="upload/index/sekolah.png" alt="" width="70%"><br>
                            <h3>Smk Wikrama Bogor</h3>
                        </div>
                        <div class="slide swiper-slide">
                            <img src="upload/index/masjid.webp" alt="" width="70%"><br>
                            <h3>Masjid 1</h3>
                        </div>
                        <div class="slide swiper-slide">
                            <img src="upload/index/arab.jpg" alt="" width="70%"><br>
                            <h3>Masjid 2</h3>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <div class="Information">
            <h1><span>Manfaat</span> Wakaf, Infaq <br> Shodaqoh. </h1><br><br>
            <h3 class="content"><b>Berikut Adalah Beberapa keutamaan Wakaf, Infaq <br> Shodaqoh Yang Akan Anda
                    Dapatkan.</b>
            </h3>
        </div>
        <img class="radius-5" src="upload/index/hand.png" alt="">
        <div class="container-card">
            <div class="box-container">
                <div class="box">
                    <div class="radius">
                        <img src="upload/index/Vector.png" alt="">
                    </div>
                    <div class="card-content">
                        <h2>Menjadikan Hati Lebih Tenang</h2>
                        <p>Kami memberikan harga yang terbaik dibandingkan dengan Kompetitor kami</p>
                        <div class="radius-1">
                            <img src="upload/index/Vector (Stroke).png" alt="">
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="radius">
                        <img src="upload/index/Subtract.png">
                    </div>
                    <div class="card-content">
                        <h2>Terbukanya pintu rezeki</h2>
                        <p>Allah SWT akan membuka pintu rezeki dari arah yang tidak dikira sebelumnya.</p>
                        <div class="radius-2">
                            <img src="upload/index/Subtract (Stroke).png" width="90px">
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="radius">
                        <img src="upload/index/verfpng.png" width="10px">
                    </div>
                    <div class="card-content">
                        <h2>Menjauhkan dari bahaya</h2>
                        <p>Rasulullah SAW pernah bersabda: “Bersegeralah untuk bersedekah, karena musibah dan bencana
                            tidak
                            bisa mendahului sedekah."</p>
                        <div class="radius-3">
                            <img src="upload/index/verifpng.png">
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="radius">
                        <img class="str" src="upload/index/starpng.png">
                    </div>
                    <div class="card-content">
                        <h2>pahala yang tak terputus</h2>
                        <p>Ini akan menolong kita di akhirat nantinya, juga dapat menyelamatkannya dari api neraka.</p>
                        <div class="radius-4">
                            <img src="upload/index/str (Stroke).png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="waqaf" id="carawakaf">
            <div class="container-wrapper">
                <h1><span>Cara Melakukan </span> Wakaf, Infaq <br> Shodaqoh. </h1><br><br>
                <h3 class="content"><b>Berikut adalah Cara melakukan wakaq, infaq shodaqoh untuk membantu pembangunan
                        masjid
                        besar SMK Wikrama Bogor.</b>
                </h3>
            </div>

            <div class="container-waqaf">
                <div class="box-container-waqaf">
                    <div class="box-waqaf">
                        <h2><span>01</span></h2>
                        <div class="waqaf-content">
                            <h2>Isi Form data diri</h2>
                            <p>Isikan form pengisian yang disediakan di form data diri, isikan dengan data diri anda dengan teliti.</p>
                        </div>
                    </div>
                    <div class="box-waqaf">
                        <h2><span>02</span></h2>
                        <div class="waqaf-content">
                            <h2>Isikan nominal shodaqoh</h2>
                            <p>Isikan nominal yang akan anda shodaqohkan, pastikan isi nominal dengan seiklasnya tanpa ada paksaan apapun.</p>
                        </div>
                    </div>
                    <div class="box-waqaf">
                        <h2><span>03</span></h2>
                        <div class="waqaf-content">
                            <h2>upload bukti pembayaran</h2>
                            <p>Pilih motode pembayaran dan upload bukti pembayaranya.</p>
                        </div>
                    </div>
                    <div class="box-waqaf">
                        <h2><span>04</span></h2>
                        <div class="waqaf-content">
                            <h2>Verifikasi Pembayaran</h2>
                            <p>Pembayaran anda akan di verifikasi oleh admin dan jika terverifikasi nama anda akan tampil.</p>
                        </div>
                    </div>
        </section>
        <section class="data-donatur" id="datawakaf">
            <div class="container-data">
                <h1><span>Data donatur </span> Wakaf, infaq <br> Shodaqoh. </h1><br><br>
                <h3 class="content"><b>Berikut adalah data donatur wakaf, infaq shodaqoh untuk masjid besar SMK Wikrama Bogor.</b>
                </h3>
            </div>
            <div class="container-table">
                <?php

                ?>
                <table border="1" cellpadding="10" cellspacing="1">
                    <tr>
                        <th>No</th>
                        <th>Nama Donatur</th>
                        <th>Donatur Id</th>
                        <th>Paket</th>
                        <th>Kategori</th>
                        <th>Nominal/Barang</th>
                    </tr>
                    <?php
                    $i = 1;
                    $sql = "SELECT * FROM datadata WHERE verifikasi = 1";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["iddonatur"]; ?></td>
                            <td><?= $row["paket"]; ?></td>
                            <td><?= $row["kategori"]; ?></td>
                            <td><?= $row["nominal"]; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </table>
            </div>
        </section>
        <section class="galery" id="galery">
            <div class="container-galery">
                <h1><span>Gallery</span> Masjid Besar Smk<br> Wikrama Bogor</h1><br><br>
                <h3 class="content"><b>Berikut adalah data donatur wakaf, infaq shodaqoh untuk masjid besar SMK Wikrama Bogor.</b>
                </h3>
            </div>
            <div class="container-card-galery">
                <div class="box-galery">
                    <img src="upload/index/Rectangle 300.png" alt="">
                </div>
                <div class="box-galery">
                    <img src="upload/index/Rectangle 301.png" alt="">
                </div>
                <div class="box-galery">
                    <img src="upload/index/Rectangle 302.png" alt="">
                </div>
                <div class="box-galery">
                    <img src="upload/index/Rectangle 303.png" alt="">
                </div>
                <div class="box-galery">
                    <img src="upload/index/Rectangle 305.png" alt="">
                </div>
                <div class="box-card">
                    <ul>
                        <li><a href="#"><i class='bx 
                    bx-right-arrow-alt'></i></a></li>
                        <h2>Buka Gallery</h2>
                    </ul>
                </div>
            </div>
        </section>
        <section class="footer">
            <footer>
                <div class="footer-left">
                    <div class="footer-title-body">
                        <img src="upload/index/unnamed 1.png">
                        <h3 class="title">Smk Wikrama <br>Bogor</h3>
                    </div>
                    <div class="address">
                        <h4>Alamat</h4>
                        <p>Jl. Raya Wangun <br>
                            Kelurahan Sindangsari<br>
                            Bogor Timur 16720</p>
                    </div><br>
                    <div class="call">
                        <h4>Telepon</h4>
                        <p> 0251-8242411 / <br>
                            082221718035 (Whatsapp)</p>
                    </div><br>
                    <div class="footer-social-icons">
                        <a href="#"><i class='bx bxl-facebook-square'></i></a>
                        <a href="#"><i class='bx bxl-twitter'></i></a>
                        <a href="#"><i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-youtube'></i></a>
                    </div>
                </div>
                <div class="footer-right">
                    <h4>Tentang Wikrama</h4>
                    <ul>
                        <li><a href="#">Sejarah</a></li>
                        <li><a href="#">Peraturan Sekolah</a></li>
                        <li><a href="#">Rencana Strategi &amp; Prestasi</a></li>
                        <li><a href="#">Yayasan</a></li>
                        <li><a href="#">Struktur Organisasi</a></li>
                        <li><a href="#">Cabang</a></li>
                        <li><a href="#">Penghargaan</a></li>
                        <li><a href="#">Kerjasama</a></li>
                    </ul>
                </div>
                <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $email = $_POST['email'];
                    $pesan = $_POST['pesan'];


                    $sql = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
                    if (mysqli_query($conn, $sql)) {
                    }
                }
                ?>
                <div class="footer-right-box">
                    <h4>Kirim Pesan</h4>
                    <div class="content-footer">
                        <form action="" method="post">
                            <div class="name">
                                <input type="text" name="nama" required placeholder="Nama">
                            </div>
                            <div class="email">
                                <input type="email" name="email" required placeholder="Email">
                            </div>
                            <div class="msg">
                                <textarea name="pesan" cols="30" rows="5" placeholder="Pesan Anda"></textarea>
                            </div>
                            <div class="btn-footer">
                                <button type="submit" name="submit">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </footer>
        </section>
        <p class="footer-copy">© 2023 - SMK Wikrama Bogor. All Rights Reserved.</p>

        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script src="assets/js/main.js"></script>
</body>
</html>