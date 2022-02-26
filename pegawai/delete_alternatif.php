<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE FROM alternatif WHERE id_alternatif = '" . $_GET['id'] . "' ");
}
// header("location:jabatan.php?pesan=hapus");
echo "<script>alert('Data berhasil dihapus.');window.location='alternatif.php?pesan=hapus';</script>";
?>