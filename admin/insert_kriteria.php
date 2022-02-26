<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'skripsi');

if (isset($_POST['insertdata'])) {
    $kriteria = $_POST['kriteria'];
    $bobot = $_POST['bobot'];
    $nilai = $_POST['nilai'];
   
    $query = "INSERT INTO kriteria VALUES ('','$kriteria','$bobot','$nilai')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // echo '<script> alert("Data Saved"); </script>';
        // header('location: jabatan.php');
        echo "<script>alert('Data berhasil ditambah!');window.location='kriteria.php';</script>";
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
