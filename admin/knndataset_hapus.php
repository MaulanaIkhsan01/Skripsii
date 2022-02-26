<?php
include '../koneksi.php';

if (isset($_GET['nomor'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_dataset WHERE nomor = '" . $_GET['nomor'] . "' ");
   
}
// header("location:pegawai.php?pesan=hapus");
echo "<script>alert('Data berhasil dihapus.');window.location='knndataset.php';</script>";
?>