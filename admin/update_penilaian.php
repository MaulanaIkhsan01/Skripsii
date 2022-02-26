<?php
session_start();
// koneksi database
include '../koneksi.php';
require_once "../vendor/autoload.php";

use Nagara\Src\Metode\MetodeFuzzySugeno;    // load library

// menangkap data yang di kirim dari form
$id_pegawai = $_POST['id_pegawai'];
$motifdiri = $_POST['motifdiri'];
$pengetahuan = $_POST['pengetahuan'];
$keterampilan = $_POST['keterampilan'];


// range kurva segitga 1 - 5 [1 , 2, 3, 4, 5]


// get value
$metode = new MetodeFuzzySugeno;
$hasil_defuzifikasi = $metode->FuzzySugeno($motifdiri, $pengetahuan, $keterampilan); //return value 1 or 0

// penentuan kompeten atau tidak kompetern
if ($hasil_defuzifikasi  > 0) {
    echo "selamat anda kompeten";
    $query =  "UPDATE pegawai SET penilaian = '1' where id_pegawai='$id_pegawai'";
    $query_run = mysqli_query($conn, $query);
}else{
    echo "maaf anda tidak kompeten";
    $query =  "UPDATE pegawai SET penilaian = '0' where id_pegawai='$id_pegawai'";
    $query_run = mysqli_query($conn, $query);
}
echo "<script>alert('Data berhasil diubah.');window.location='penilaian.php';</script>";
