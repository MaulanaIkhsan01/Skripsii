<?php
// koneksi database
session_start();
include '../koneksi.php';

// menangkap data yang di kirim dari form
    $id_jabatan = $_POST['id_jabatan'];
    $nama_jabatan = $_POST['nama_jabatan'];
    $job_desc = $_POST['job_desc'];
    $created_by = $_SESSION['username'];
    $updated_by = $_SESSION['username'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
   

// update data ke database
mysqli_query($conn, "UPDATE jabatan set nama_jabatan='$nama_jabatan', job_desc='$job_desc', created_by='$created_by', updated_by='$updated_by', created_at='$created_at', updated_at='$updated_at'  where id_jabatan='$id_jabatan'");

// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data berhasil diubah!');window.location='jabatan.php';</script>";

