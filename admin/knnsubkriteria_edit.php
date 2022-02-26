<?php
// koneksi database
session_start();
include '../koneksi.php';

// menangkap data yang di kirim dari form
    $id_nilai = $_POST['id_nilai'];
    $id_atribut = $_POST['id_atribut'];
    $nama_nilai = $_POST['nama_nilai'];
    
   

// update data ke database
$query = "UPDATE tb_nilai set id_atribut='$id_atribut', nama_nilai='$nama_nilai' where id_nilai='$id_nilai'";
// var_dump($query); die;
$query_run = mysqli_query($conn, $query);
// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data berhasil diubah!');window.location='knnsubkriteria.php';</script>";

