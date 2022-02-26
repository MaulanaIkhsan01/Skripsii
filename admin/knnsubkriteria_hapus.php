<?php
include '../koneksi.php';

if (isset($_GET['id_nilai'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_nilai WHERE id_nilai = '" . $_GET['id_nilai'] . "' ");
  

}
// header("location:pegawai.php?pesan=hapus");
echo "<script>alert('Data berhasil dihapus.');window.location='knnsubkriteria.php';</script>";
?>