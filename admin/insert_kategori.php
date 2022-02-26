<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'skripsi');

if (isset($_POST['insertdata'])) {
    $nama_kategori = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];
    $created_by = $_SESSION['username'];
    $updated_by = $_SESSION['username'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
   
    $query = "INSERT INTO kategori VALUES ('','$nama_kategori','$deskripsi','$created_by','$updated_by','$created_at','$updated_at')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script>alert('Data berhasil ditambah.');window.location='kategori.php';</script>";
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
