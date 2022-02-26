<?php
require_once 'functions.php';





/** ATRIBUT */
if ('knnkriteria.php') {
    $id_atribut = $_POST['id_atribut'];
    $nama_atribut = $_POST['nama_atribut'];
    $keterangan = $_POST['keterangan'];

    if (!$id_atribut || !$nama_atribut)
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_atribut WHERE id_atribut='$id_atribut'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_atribut (id_atribut, nama_atribut, keterangan) 
            VALUES ('$id_atribut', '$nama_atribut', '$keterangan')");
        $db->query("INSERT INTO tb_dataset (nomor, id_atribut) SELECT nomor, '$id_atribut' FROM tb_dataset GROUP BY nomor");
        echo "<script>alert('Data berhasil ditambah.');window.location='knnkriteria.php';</script>";

    }
}