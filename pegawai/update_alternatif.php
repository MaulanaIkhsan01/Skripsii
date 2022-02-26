<?php
// koneksi database
session_start();
include '../koneksi.php';

// menangkap data yang di kirim dari form
    $id_alternatif = $_POST['id_alternatif'];
    $id_project = $_POST['id_project'];
    $c1 = (int) $_POST['c1'];
    $c2 = (int) $_POST['c2'];
    $c3 = (int) $_POST['c3'];
    $c4 = (int) $_POST['c4'];
    $c5 = (int) $_POST['c5'];
   

// update data ke database
$query = "UPDATE alternatif set id_project='$id_project', c1='$c1', c2='$c2', c3='$c3', c4='$c4', c5='$c5'  where id_alternatif='$id_alternatif'";
// var_dump($query); die;
$query_run = mysqli_query($conn, $query);
// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data berhasil diubah!');window.location='alternatif.php';</script>";

