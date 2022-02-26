<?php
session_start();
include '../koneksi.php';
include '../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Project</title>
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
      <?php

      use Nagara\Src\Database\DB;
      use Nagara\Src\Math\MatrixClass;
      use Nagara\Src\Metode\MetodeOreste;

      // untuk config bisa di pass ke variabel atau langsung ke constructornya
      $type = "mysql";
      $servername = "localhost";
      $database = "skripsi_ikhsan";
      $username = "root";
      $password = "";

      // pass ke constructorynya
      $db = new DB($type, $servername, $username, $password, $database);

      // SELECT
      $nilaialternatif = $db->select("SELECT * FROM alternatif
      INNER JOIN project ON alternatif.id_project = project.id_project
      ORDER BY id_alternatif");

      $bobot = $db->select("SELECT * FROM kriteria");

      // Object Oriented
      $matrix = new MatrixClass;
      //membuat multiple matrix
      $alternatif = $matrix->make_new_matrix($nilaialternatif, 5, ["c1", "c2", "c3", "c4", "c5"]);

      $id = $matrix->make_new_matrix($nilaialternatif, 1, ["id_alternatif"]);


      $databobot =  $matrix->make_new_matrix($bobot, 1, ["bobot"]);

      $nilaibobot = [];
      foreach ($databobot[0] as $value) {
        $nilaibobot[] = $value / 100;
      }

      $nilaialternatif = [];
      foreach ($alternatif as $index => $matrix_n) {
        foreach ($matrix_n as $key => $value) {
          $nilaialternatif[$index][$key] = $value * 1;
        }
      }

      //select nama alternatif
      $namaalternatif = $db->select("SELECT id_project, nama_project FROM `project`
      ");

      # buat object baru dari metodenya
      $metode = new MetodeOreste;
      $metode->oreste($nilaialternatif, $nilaibobot);

      // method getter
      $besson = $metode->getBessonRank();
      $distanceScore = $metode->getDistanceScore();
      $preferensi = $metode->getPreferensi();

      $transform = $matrix->flip_matrix($alternatif);

      ?>

      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <h3>Project List</h3>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">index</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          sort($preferensi);
                          $counter = 0;
                          ?>
                          <?php foreach ($preferensi as $rank => $value) : ?>
                            <?php $counter++ ?>
                            <tr>
                            <?php
                            $query = "SELECT * FROM alternatif
                            INNER JOIN project ON alternatif.id_project = project.id_project
                            where hasil='$value'
                          ";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_fetch_assoc($query_run);
                  foreach ($query_run as $d) {
                           ?>
                              <td><?php echo $d['nama_project']; ?></td>
                              <?php };?>
                              
                              <?php //endif; ?>
                              <td><?= $rank + 1 ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
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
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
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
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="mini_sidebar_setting">
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