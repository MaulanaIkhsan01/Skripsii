<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE FROM kriteria WHERE id_kriteria = '" . $_GET['id'] . "' ");
}
// header("location:jabatan.php?pesan=hapus");
echo "<script>alert('Data berhasil dihapus.');window.location='kriteria.php?pesan=hapus';</script>";
?>