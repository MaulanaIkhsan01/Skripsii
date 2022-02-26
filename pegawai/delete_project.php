<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE FROM project WHERE id_project = '" . $_GET['id'] . "' ");
}

echo "<script>alert('Data berhasil dihapus.');window.location='project.php?pesan=hapus';</script>";
?>