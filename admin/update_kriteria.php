<?php
// koneksi database
session_start();
include '../koneksi.php';

// menangkap data yang di kirim dari form
    $id_kriteria = $_POST['id_kriteria'];
    $kriteria = $_POST['kriteria'];
    $bobot = $_POST['bobot'];
    $nilai = $_POST['nilai'];
   

// update data ke database
mysqli_query($conn, "UPDATE kriteria set kriteria='$kriteria', bobot='$bobot', nilai='$nilai'  where id_kriteria='$id_kriteria'");

// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data berhasil diubah!');window.location='kriteria.php';</script>";

