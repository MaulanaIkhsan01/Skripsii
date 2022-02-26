<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'skripsi');

if (isset($_POST['insertdata'])) {
    $nama_pegawai = $_POST['nama_pegawai'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $username = $_POST['username'];
    $password =  md5($_POST['password']);
    $id_jabatan = $_POST['id_jabatan'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $image = $_FILES['image']['name'];
    $level = $_POST['level'];
    $is_active = 1;
    $created_by = $_SESSION['username'];
    $updated_by = $_SESSION['username'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
   
    //cek dulu jika ada gambar produk jalankan coding ini
    if ($image != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $image); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['image']['tmp_name'];
        $angka_acak     = rand(1, 999);

        $nama_gambar_baru = $angka_acak . '-' . $image; //menggabungkan angka acak dengan nama file sebenarnya
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../assets/img/profile/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
            $query = "INSERT INTO pegawai VALUES ('','$nama_pegawai', '$jenis_kelamin', '$username', '$password', '$id_jabatan','$tempatlahir','$tanggallahir','$tel','$email','$alamat','$image', '$level', '$is_active','$created_by','$updated_by','$created_at','$updated_at')";
            $query_run = mysqli_query($conn, $query);

            if (!$query_run) {
                die("Query gagal dijalankan: " . mysqli_errno($conn) .
                    " - " . mysqli_error($conn));
            } else {
                //tampil alert dan akan redirect ke halaman user.php
                //silahkan ganti index.php sesuai halaman yang akan dituju
                echo "<script>alert('Data berhasil ditambah.');window.location='pegawai.php';</script>";
            }
        } else {
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='pegawai.php';</script>";
        }
    } else {
        $query = "INSERT INTO pegawai VALUES ('','$nama_pegawai', '$jenis_kelamin', '$username', '$password', '$id_jabatan','$tempatlahir','$tanggallahir','$tel','$alamat','null','$level', '$is_active','$created_by','$updated_by','$created_at','$updated_at')";
            $query_run = mysqli_query($conn, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            echo "<script>alert('Data berhasil ditambah !');window.location='pegawai.php';</script>";
        }
    }


    
}
