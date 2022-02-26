<?php
// mengaktifkan session php
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman ke halaman login
// header("Location: ../index.php");
echo "<script>alert('Berhasil Logout !');window.location='index.php';</script>";
