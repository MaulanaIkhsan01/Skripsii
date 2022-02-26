<?php
include '../koneksi.php';

if (isset($_GET['id_atribut'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_atribut WHERE id_atribut = '" . $_GET['id_atribut'] . "' ");
    $delete = mysqli_query($conn, "DELETE FROM tb_nilai WHERE id_atribut = '" . $_GET['id_atribut'] . "' ");
    $delete = mysqli_query($conn, "DELETE FROM tb_dataset WHERE id_atribut = '" . $_GET['id_atribut'] . "' ");

}
// header("location:pegawai.php?pesan=hapus");
echo "<script>alert('Data berhasil dihapus.');window.location='knnkriteria.php';</script>";
?>