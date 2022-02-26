<?php
// koneksi database
session_start();
include '../koneksi.php';

// menangkap data yang di kirim dari form
    $id_project = $_POST['id_project'];
    $nama_project = $_POST['nama_project'];
    $deskripsii = $_POST['deskripsii'];
    $id_kategori = $_POST['id_kategori'];
    $id_case = $_POST['id_case'];
    $id_tracking = $_POST['id_tracking'];
    $id_pegawai = $_POST['id_pegawai'];
    $id_priority = $_POST['id_priority'];
    // $nominal = $_POST['nominal'];
    $start_date = $_POST['start_date'];
    $due_date = $_POST['due_date'];
    $is_delete = 0;
    $created_by = $_SESSION['username'];
    $updated_by = $_SESSION['username'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
   

// update data ke database
mysqli_query($conn, "UPDATE project set nama_project='$nama_project', deskripsii='$deskripsii', id_kategori='$id_kategori', id_case='$id_case', id_tracking='$id_tracking', id_pegawai='$id_pegawai', id_priority='$id_priority', start_date='$start_date', due_date='$due_date', is_delete='$is_delete', created_by='$created_by', created_at='$created_at', updated_by='$updated_by', updated_at='$updated_at'  where id_project='$id_project'");

// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data berhasil diubah.');window.location='project.php';</script>";
