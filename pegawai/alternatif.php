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
              <h4>FORM ALTERNATIF</h4>
                <div class="card">
                <div class="card-header">
                    <div class="float-left">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'skripsi_ikhsan');
                    $query = "SELECT * FROM alternatif
                              INNER JOIN project ON alternatif.id_project = project.id_project
                              ORDER BY id_alternatif
                            ";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($query_run);

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
                    $alternatif = $matrix->make_new_matrix($nilaialternatif, 5, ["c1","c2","c3","c4","c5"]);

                    $id = $matrix->make_new_matrix($nilaialternatif, 1, ["id_alternatif"]);
                    

                    $databobot =  $matrix->make_new_matrix($bobot, 1, ["bobot"]);

                    $nilaibobot = [];
                    foreach($databobot[0] as $value){
                      $nilaibobot[] = $value / 100;
                    }

                    $nilaialternatif = [];
                    foreach($alternatif as $index => $matrix_n){
                      foreach($matrix_n as $key => $value){
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

                    // // UPDATE
                    // $db->update("UPDATE alternatif SET hasil = 'update fiture' WHERE id_alternatif = 1");

                    foreach($preferensi as $index => $value){
                      $number = $index - 1;
                      $db->update("UPDATE alternatif SET hasil = {$value} WHERE id_alternatif = {$id[0][$number]}");
                    }

                    ?>
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th class="text-center">Nama Alternatif</th>
                            <th class="text-center">C1</th>
                            <th class="text-center">C2</th>
                            <th class="text-center">C3</th>
                            <th class="text-center">C4</th>
                            <th class="text-center">C5</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <?php
                        $no = 1;
                        if ($query_run) {
                           foreach ($query_run as $d) {
                        ?>
                        <tbody>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $d['nama_project']; ?></td>
                            <td class="text-center"><?php echo $d['c1']; ?></td>
                            <td class="text-center"><?php echo $d['c2']; ?></td>
                            <td class="text-center"><?php echo $d['c3']; ?></td>
                            <td class="text-center"><?php echo $d['c4']; ?></td>
                            <td class="text-center"><?php echo $d['c5']; ?></td>
                            <td align="center">
                            <a href="edit_alternatif.php?id=<?php echo $d['id_alternatif']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="delete_alternatif.php?id=<?php echo $d['id_alternatif']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                            </tr>

                           <?php
                           }
                        } else {
                          echo "No record Found";
                        }
                         ?>

                        </tbody>
                      </table>
                    </div>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Data Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="insert_alternatif.php" method="post" class="form-user" enctype="multipart/form-data">
                    <div class="modal-body">
                    <div class="form-group">
                            <label class="control-label" for="id_project">Nama Alternatif</label>
                            <select name="id_project" id="id_project" class="form-control" required>
                                <option value=""> --- Pilih Alternatif --- </option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM project");
                                while ($d = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$d['id_project'].'">'.$d['nama_project'].'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="c1">C1</label>
                            <input type="number" name="c1" class="form-control" id="c1" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="c2">C2</label>
                            <input type="number" name="c2" class="form-control" id="c2" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="c3">C3</label>
                            <input type="number" name="c3" class="form-control" id="c3" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="c4">C4</label>
                            <input type="number" name="c4" class="form-control" id="c4" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="c5">C5</label>
                            <input type="number" name="c5" class="form-control" id="c5" required>
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