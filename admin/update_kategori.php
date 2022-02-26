<?php
// koneksi database
session_start();
include '../koneksi.php';

// menangkap data yang di kirim dari form
    $id = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];
    $created_by = $_SESSION['username'];
    $updated_by = $_SESSION['username'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
   

// update data ke database
mysqli_query($conn, "UPDATE kategori set nama_kategori='$nama_kategori', deskripsi='$deskripsi', created_by='$created_by', updated_by='$updated_by', created_at='$created_at', updated_at='$updated_at'  where id_kategori='$id_kategori'");

// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data berhasil diubah.');window.location='kategori.php';</script>";
