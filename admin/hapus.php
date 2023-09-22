<?php
require '../connect.php';

if (isset($_GET['iddonatur'])) {
    $hapus = mysqli_query($conn, "DELETE FROM donatur WHERE id = '" . $_GET['iddonatur'] . "'");
    echo "<script> alert('Data berhasil dihapus')
            window.location.href = 'donatur.php';</script>";
}

if (isset($_GET['iddata'])) {

    $data = mysqli_query($conn, "SELECT gambar FROM datadata WHERE id ='" . $_GET['iddata'] . "'");
    if (mysqli_num_rows($data) > 0) {
        $p = mysqli_fetch_object($data);
        if (file_exists("../upload/verf/" . $p->gambar)) {
            unlink("../upload/verf/" . $p->gambar);
        }
    }
    $hapus = mysqli_query($conn, "DELETE FROM datadata WHERE id = '" . $_GET['iddata'] . "'");
    echo "<script> alert('Data berhasil dihapus')
            window.location.href = 'data.php';</script>";
}

if (isset($_GET['idgaleri'])) {
    $galeri = mysqli_query($conn, "SELECT gambar FROM galeri WHERE id ='" . $_GET['idgaleri'] . "'");
    if (mysqli_num_rows($galeri) > 0) {
        $p = mysqli_fetch_object($galeri);
        if (file_exists("../upload/galeri/" . $p->gambar)) {
            unlink("../upload/galeri/" . $p->gambar);
        }
    }
    $hapus = mysqli_query($conn, "DELETE FROM galeri WHERE id = '" . $_GET['idgaleri'] . "'");
    if ($hapus) {
        echo "<script> alert('Data berhasil dihapus');
                window.location.href = 'galery.php';
                </script>";
    } else {
        echo "<script> alert('Gagal menghapus data');
                </script>";
    }
}

if (isset($_GET['idinformasi'])) {

    $informasi = mysqli_query($conn, "SELECT gambar FROM informasi WHERE id ='" . $_GET['idinformasi'] . "'");
    if (mysqli_num_rows($informasi) > 0) {
        $p = mysqli_fetch_object($informasi);
        if (file_exists("../uploads/informasi/" . $p->gambar)) {
            unlink("../uploads/informasi/" . $p->gambar);
        }
    }
    $hapus = mysqli_query($conn, "DELETE FROM informasi WHERE id = '" . $_GET['idinformasi'] . "'");
    echo "<script> alert('Data berhasil dihapus')
            window.location.href = 'informasi.php';</script>";
}

if (isset($_GET['idpesan'])) {
    $hapus = mysqli_query($conn, "DELETE FROM kontak WHERE id = '" . $_GET['idpesan'] . "'");
    echo "<script> alert('Data berhasil dihapus')
            window.location.href = 'pesan.php';</script>";
}
