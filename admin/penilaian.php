<?php
session_start();
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <!-- header -->
      <?php include 'header.php'; ?>

      <!-- end header -->
      <!-- Start navbar -->
      <div class="main-sidebar sidebar-style-2">
        <?php include 'navbar.php'; ?>
      </div>
      <!-- end navbar -->
      <!-- Main Content -->
     
      <div class="main-content">
        <section class="section">
          <!-- <div class="section-body"> -->
            <div class="row">
              <div class="col-12">
              <h4>FORM Penilaian</h4>
                <div class="card">
                  <div class="card-header">
                    <div class="float-left">
                      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                      </button> -->
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th class="text-center">Nama Pegawai</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Umur</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Penilaian</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $query = "SELECT * FROM pegawai
                                  INNER JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan
                                  ORDER BY id_pegawai
                        ";
                        $sql_pegawai = mysqli_query($conn, $query) or die (mysqli_error($conn));
                        while ($data = mysqli_fetch_array($sql_pegawai)) {?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $data['nama_pegawai']; ?></td>
                            <td class="text-center"><?php echo $data['nama_jabatan']; ?></td>
                            <td class="text-center"><?php $lahir = new DateTime($data['tanggallahir']);
                              $today = new DateTime();
                              $umur = $today->diff($lahir);
                              echo $umur->y; echo " Tahun ";
                            ?>
                            </td>
                            <td class="text-center"><?php echo $data['jenis_kelamin']; ?></td>
                            <td class="text-center">
                              <?php 
                              if($data['penilaian'] =='0'){
                                echo "Tidak Kompeten";
                              }elseif($data['penilaian'] =='1'){
                                echo "Kompeten";
                              }else{
                                echo "Belum Ada Penilaian";
                              };
                            ?>
                            </td>
                            <td align="center">
                            <a href="detail_penilaian.php?id=<?php echo $data['id_pegawai']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            
                            </tr>
                          <?php
                          } ?>
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- </div> -->
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label>
                    <span class="control-label p-r-20">Mini Sidebar</span>
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include 'footer.php'; ?>
    </div>
  </div>

  <!-- Modal Start -->
  <div class="modal fade" id="modalTambah" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="insert_pegawai.php" method="post" class="form-user" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="nama_pegawai">Nama Pegawai</label>
                            <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="text" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_jabatan">Jabatan</label>
                            <select name="id_jabatan" id="id_jabatan" class="form-control" required>
                                <option value=""> --- Pilih Jabatan --- </option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM jabatan");
                                while ($d = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$d['id_jabatan'].'">'.$d['nama_jabatan'].'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tempatlahir">Tempat Lahir</label>
                            <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tanggallahir">Tanggal Lahir</label>
                            <input type="date" name="tanggallahir" class="form-control" id="tanggallahir" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value=""> --- Pilih Jenis Kelamin --- </option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tel">Telepon</label>
                            <input type="number" name="tel" class="form-control" id="tel" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="alamat">Alamat</label>
                            <input type="textarea" name="alamat" class="form-control" id="alamat" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="image">Image</label>
                            <input type="file" name="image" class="form-control" id="image" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value=""> --- Pilih Level --- </option>
                                <option value="Admin">Admin</option>
                                <option value="Pegawai">Pegawai</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" name="insertdata" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
                            <button type="reset" class="btn btn-warning m-t-15 waves-effect">Reset</button>
                        </div>
                </form>
            </div>
        </div>

    </div>
  <!-- General JS Scripts -->
  <script src="../assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="../assets/bundles/datatables/datatables.min.js"></script>
  <script src="../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <script src="../assets/bundles/sweetalert/sweetalert.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/datatables.js"></script>
  <script src="../assets/js/page/sweetalert.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>
</body>

</html>