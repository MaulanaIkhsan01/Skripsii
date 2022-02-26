<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE FROM kategori WHERE id = '" . $_GET['id'] . "' ");
}
echo "<script>alert('Data berhasil dihapus.');window.location='kategori.php?pesan=hapus';</script>";

?>