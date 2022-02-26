<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE FROM pegawai WHERE id_pegawai = '" . $_GET['id'] . "' ");
}
// header("location:pegawai.php?pesan=hapus");
echo "<script>alert('Data berhasil dihapus.');window.location='pegawai.php?pesan=hapus';</script>";
?>