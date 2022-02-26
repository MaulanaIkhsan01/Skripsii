<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'skripsi');

if (isset($_POST['insertdata'])) {
    $nama_jabatan = $_POST['nama_jabatan'];
    $job_desc = $_POST['job_desc'];
    $created_by = $_SESSION['username'];
    $updated_by = $_SESSION['username'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
   
    $query = "INSERT INTO jabatan VALUES ('','$nama_jabatan','$job_desc','$created_by','$updated_by','$created_at','$updated_at')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // echo '<script> alert("Data Saved"); </script>';
        // header('location: jabatan.php');
        echo "<script>alert('Data berhasil ditambah!');window.location='jabatan.php';</script>";
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
