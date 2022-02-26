<?php
// koneksi database
session_start();
include '../koneksi.php';

// menangkap data yang di kirim dari form
    $id_task = $_POST['id_task'];
    $nama_task = $_POST['nama_task'];
    $deskripsi= $_POST['deskripsi'];
    $id_status=$_POST['id_status'];
    $create_by = $_SESSION['username'];
    $create_at = date("Y-m-d H:i:s");
    $update_by = $_SESSION['username'];
    $update_at = date("Y-m-d H:i:s");
   

// update data ke database
mysqli_query($conn, "UPDATE task set nama_task='$nama_task', deskripsi='$deskripsi', id_status='$id_status', create_by='$create_by', create_at='$create_at', update_by='$update_by', update_at='$update_at'  where id_task='$id_task'");

// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data berhasil diubah!');window.location='task.php';</script>";

