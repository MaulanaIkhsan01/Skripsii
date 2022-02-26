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
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                <form action="update_project.php" method="post" class="form-user" enctype="multipart/form-data">
                  <div class="card-header">
                    <h4>Edit Project</h4>
                  </div>
                    <?php
                    include '../koneksi.php';
                    $query = "SELECT * FROM project where id_project = $_GET[id]";
                    $query_run = mysqli_query($conn, $query);
                    $result = mysqli_fetch_assoc($query_run);
                    ?>

                  <div class="card-body">
                    <div class="form-group">
                      <label class="control-label" for="nama_project">Nama project</label>
                      <input type="hidden" name="id_project" value="<?php echo $result['id_project']; ?>" class="form-control" required>
                      <input type="text" name="nama_project" value="<?php echo $result['nama_project']; ?>" id="nama_project" class="form-control" required>
                    </div>
                    <div class="form-group">
                            <label class="control-label" for="deskripsii">Deskripsi</label>
                            <input type="text" name="deskripsii" value="<?php echo $result['deskripsii']; ?>" class="form-control" id="deskripsii" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_kategori">Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value=""> --- Pilih kategori --- </option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM kategori");
                                while ($d = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$d['id_kategori'].'">'.$d['nama_kategori'].'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_case">Case</label>
                            <select name="id_case" id="id_case" class="form-control" required>
                                <option value=""> --- Pilih Case --- </option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM project_case");
                                while ($d = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$d['id_case'].'">'.$d['nama_case'].'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_tracking">Tracker</label>
                            <select name="id_tracking" id="id_tracking" class="form-control" required>
                                <option value=""> --- Pilih Tracker --- </option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM tb_tracking");
                                while ($d = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$d['id_tracking'].'">'.$d['nama_tracking'].'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="assignee">Assignee</label>
                            <select name="id_pegawai" id="id_pegawai" class="form-control" required>
                                <option value=""> --- Pilih Assignee --- </option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM pegawai");
                                while ($d = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$d['id_pegawai'].'">'.$d['nama_pegawai'].'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_priority">Priority</label>
                            <select name="id_priority" id="id_priority" class="form-control" required>
                                <option value=""> --- Pilih Priority --- </option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM tb_priority");
                                while ($d = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$d['id_priority'].'">'.$d['nama_priority'].'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nominal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    Rp.
                                  </div>
                                </div>
                                <input type="text" name="nominal" value="<?php echo $result['nominal']; ?>" class="form-control" id="nominal" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="due_date">Due Date</label>
                            <input type="date" name="due_date" class="form-control" id="due_date" required>
                        </div>
                    
                  <div class="card-footer text-right">
                  <a href="project.php" class="btn btn-danger m-t-15 waves-effect">Cancel</a>
                   <button type="submit" name="" class="btn btn-primary m-t-15 waves-effect">Update</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
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