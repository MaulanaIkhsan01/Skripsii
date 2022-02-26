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
  <!-- <div class="loader"></div> -->
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

      //select nama alternatif
      $namaalternatif = $db->select("SELECT id_project, nama_project FROM `project`
      ");
      
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
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <h3>Matrix</h3>
                      <table class="table mt-2">
                        <thead>
                          <tr>
                            <th scope="col">C1</th>
                            <th scope="col">C2</th>
                            <th scope="col">C3</th>
                            <th scope="col">C4</th>
                            <th scope="col">C5</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($transform as $value) : ?>
                            <tr>
                              <td><?= $value[0] ?></td>
                              <td><?= $value[1] ?></td>
                              <td><?= $value[2] ?></td>
                              <td><?= $value[3] ?></td>
                              <td><?= $value[4] ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>

                      <h3 class="mt-5 mb-2">Besson Rank</h3>
                      <table class="table mt-2">
                        <thead>
                          <tr>
                            <th scope="col">C1</th>
                            <th scope="col">C2</th>
                            <th scope="col">C3</th>
                            <th scope="col">C4</th>
                            <th scope="col">C5</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($besson as $value) : ?>
                            <tr>
                              <td><?= $value[1] ?></td>
                              <td><?= $value[2] ?></td>
                              <td><?= $value[3] ?></td>
                              <td><?= $value[4] ?></td>
                              <td><?= $value[5] ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>

                      <h3 class="mt-5 mb-2">Distance Score</h3>
                      <table class="table mt-2">
                        <thead>
                          <tr>
                            <th scope="col">C1</th>
                            <th scope="col">C2</th>
                            <th scope="col">C3</th>
                            <th scope="col">C4</th>
                            <th scope="col">C5</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($distanceScore as $value) : ?>
                            <tr>
                              <td><?= $value[1] ?></td>
                              <td><?= $value[2] ?></td>
                              <td><?= $value[3] ?></td>
                              <td><?= $value[4] ?></td>
                              <td><?= $value[5] ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>

                      <h3 class="mt-5 mb-2">Preferensi</h3>
                      <table class="table mt-2">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Preferensi</th>
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
                              <td><?= "P0{$counter}" ?></td>
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

                              <td><?= $value ?></td>
                              <td><?= $rank + 1 ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>

                      <h3 class="mt-5 mb-2">Hasil</h3>
                      <table class="table table-striped">
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
                              <?php //if($counter == $namaalternatif[0]["id_project"]):?>
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
        </section>
        <div id="curve_chart" style="width: 100%; height: 500px"></div>
        <!-- <div id="columnchart_values" style="width: 900px; height: 300px;"></div> -->
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