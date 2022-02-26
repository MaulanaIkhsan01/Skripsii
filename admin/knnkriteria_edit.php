<?php
// koneksi database
session_start();
include '../koneksi.php';

// menangkap data yang di kirim dari form
    $id_atribut = $_POST['id_atribut'];
    $nama_atribut = $_POST['nama_atribut'];
    $keterangan = $_POST['keterangan'];
    
   

// update data ke database
$query = "UPDATE tb_atribut set nama_atribut='$nama_atribut', keterangan='$keterangan' where id_atribut='$id_atribut'";
// var_dump($query); die;
$query_run = mysqli_query($conn, $query);
// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data berhasil diubah!');window.location='knnkriteria.php';</script>";

