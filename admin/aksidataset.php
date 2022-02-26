<?php
require_once 'functions.php';


if ('knndataset.php') {
    $nomor = $_POST['nomor'];
    $ket_dataset = $_POST['ket_dataset'];

    $error = false;
    foreach ($_POST['nilai'] as $key => $val) {
        if (!$val)
            $error = true;
    }

    if ($error) {
        print_msg("Field yang bertanda * tidak boleh kosong!");
    } elseif ($db->get_row("SELECT * FROM tb_dataset WHERE nomor='$nomor'")) {
        print_msg("Nomor sudah ada");
    } else {
        foreach ($_POST['nilai'] as $key => $val) {
            $db->query("INSERT INTO tb_dataset (nomor, ket_dataset, id_atribut, id_nilai) VALUES ('$nomor', '$ket_dataset', '$key', '$val')");
        }
        echo "<script>alert('Data berhasil ditambah.');window.location='knndataset.php';</script>";
    }
} else if ($mod == 'dataset_ubah') {
    $ket_dataset = $_POST['ket_dataset'];
    $error = false;
    foreach ($_POST['nilai'] as $key => $val) {
        if (!$val)
            $error = true;
    }

    if ($error) {
        print_msg("Field yang bertanda * tidak boleh kosong!");
    } else {
        foreach ($_POST['nilai'] as $key => $val) {
            $db->query("UPDATE tb_dataset SET ket_dataset='$ket_dataset', id_nilai='$val' WHERE id_dataset='$key'");
        }
        redirect_js("index.php?m=dataset");
    }
} 
