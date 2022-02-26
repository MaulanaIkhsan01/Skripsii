<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'skripsi_ikhsan');

if (isset($_POST['insertdata'])) {
    $id_project = $_POST['id_project'];
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    $c5 = $_POST['c5'];
    $hasil = $_POST['hasil'];
   
    $query = "INSERT INTO alternatif VALUES ('','$id_project','$c1','$c2', '$c3', '$c4', '$c5', '$hasil')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // echo '<script> alert("Data Saved"); </script>';
        // header('location: jabatan.php');
        echo "<script>alert('Data berhasil ditambah!');window.location='alternatif.php';</script>";
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
