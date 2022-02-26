<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'skripsi');

if (isset($_POST['insertdata'])) {
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

   
    $query = "INSERT INTO project VALUES ('','$nama_project','$deskripsii','$id_kategori', '$id_case', '$id_tracking', '$id_pegawai', '$id_priority', '$start_date', '$due_date', '$is_delete', '$created_by', '$created_at', '$updated_by','$updated_at')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script>alert('Data berhasil ditambah.');window.location='project.php';</script>";
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
