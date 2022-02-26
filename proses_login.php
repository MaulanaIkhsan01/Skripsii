<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = md5($_POST['password']);

// menyeleksi data user dengan username dan password yang sesuai
// $masuk = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'");
$masuk = mysqli_query($conn, "SELECT * FROM pegawai WHERE email='$email' AND password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($masuk);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($masuk);

    // cek jika user login sebagai admin
    if ($data['level'] == "Admin") {

        // buat session login dan username
        $_SESSION['email'] = $email;
        $_SESSION['id_pegawai'] = $data['id_pegawai'];
        // $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $data['username'];
        // $_SESSION['password'] = $data['password'];
        $_SESSION['image'] = $data['image']; 
        $_SESSION['level'] = "Admin";
        // alihkan ke halaman dashboard admin
        // header("location: admin/Dashboard.php");
        echo "<script>alert('Berhasil Login!');window.location='admin/Dashboard.php';</script>";

        // cek jika user login sebagai pegawai
    } else if ($data['level'] == "Pegawai") {
        // buat session login dan username
        $_SESSION['email'] = $email;
        $_SESSION['id_pegawai'] = $data['id_pegawai'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['image'] = $data['image'];
        $_SESSION['level'] = "Pegawai";
        // alihkan ke halaman dashboard pegawai
        // header("location: pegawai/Dashboard2.php");
        echo "<script>alert('Berhasil Login!');window.location='pegawai/Dashboard.php';</script>";
    }
} else {
    // header("location:index.php?pesan=gagal");
    echo "<script>alert('Gagal Login!');window.location='index.php?pesan=gagal';</script>";
}
