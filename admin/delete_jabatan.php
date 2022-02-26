<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE FROM jabatan WHERE id_jabatan = '" . $_GET['id'] . "' ");
}
// header("location:jabatan.php?pesan=hapus");
echo "<script>alert('Data berhasil dihapus.');window.location='jabatan.php?pesan=hapus';</script>";
?>