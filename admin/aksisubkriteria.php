<?php
require_once 'functions.php';



/** NILAI ATRIBUT */
if ('knnsubkriteria.php') {
    $id_atribut = $_POST['id_atribut'];
    $nama_nilai = $_POST['nama_nilai'];

    if (!$id_atribut || !$nama_nilai)
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_nilai (id_atribut, nama_nilai) VALUES ('$id_atribut', '$nama_nilai')");
        echo "<script>alert('Data berhasil ditambah.');window.location='knnsubkriteria.php';</script>";
    }
} else if ($mod == 'nilai_ubah') {
    $id_atribut = $_POST['id_atribut'];
    $nama_nilai = $_POST['nama_nilai'];

    if (!$id_atribut || !$nama_nilai)
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_nilai SET id_atribut='$id_atribut', nama_nilai='$nama_nilai' WHERE id_nilai='$_GET[ID]'");
        redirect_js("index.php?m=nilai");
    }
} 

