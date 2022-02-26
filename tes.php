<?php 
include 'koneksi.php';
session_start();
      if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  
  $queryuser = mysqli_query($conn, "SELECT *FROM user WHERE username='$username' AND password='$password'");
  $result1 = mysqli_fetch_array($queryuser);

  $querypegawai = mysqli_query($conn, "SELECT *FROM pegawai WHERE username='$username' AND password='$password'");
  $result2 = mysqli_fetch_array($querypegawai);
  
  if (mysqli_num_rows($queryuser) == 1) {
    $_SESSION["admin"] = $result1;
    $_SESSION['id_user'] = $result1['id_user'];
    $_SESSION['username'] = $result1['username'];
    $_SESSION['password'] = $result1['password'];
    $_SESSION['nama'] = $result1['nama'];
    $_SESSION['image'] = $result1['image'];
    $_SESSION['level'] = 'admin';
    header('location:admin/Dashboard.php');
}
elseif (mysqli_num_rows($querypegawai) == 1) {
    $_SESSION["pegawai"] = $result2;
    $_SESSION['user_id'] = $result2['id_user'];
    $_SESSION['username'] = $result2['username'];
    $_SESSION['password'] = $result2['password'];
    $_SESSION['nama_pegawai'] = $result2['nama_pegawai'];
    $_SESSION['tempatlahir'] = $result2['nip'];
    $_SESSION['tanggallahir'] = $result2['tanggallahir'];
    $_SESSION['tel'] = $result2['tel'];
    $_SESSION['img'] = $result2['img'];
    $_SESSION['id_jabatan'] = $result2['id_jabatan'];
    // $_SESSION['level_user'] = 'guru';
    header('location:pegawai/dashboard_pegawai.php');
} else {
    echo "Login Gagal";
} 
}?>