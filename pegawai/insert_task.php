<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'skripsi');

if (isset($_POST['insertdata'])) {
    $nama_task = $_POST['nama_task'];
    $id_project = $_POST['id_project'];
    $deskripsi = $_POST['deskripsi'];
    $start_date = $_POST['start_date'];
    $due_date = $_POST['due_date'];
    $id_status = $_POST['id_status'];
    $created_by = $_SESSION['username'];
    $created_at = date("Y-m-d H:i:s");
    $updated_by = $_SESSION['username'];
    $updated_at = date("Y-m-d H:i:s");

   
    $query = "INSERT INTO task VALUES ('', '$nama_task', '$id_project', '$deskripsi', '$start_date', '$due_date', '$id_status', '$created_by', '$created_at', '$updated_by','$updated_at')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script>alert('Data berhasil ditambah.');window.location='task.php';</script>";
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
