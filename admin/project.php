<?php
session_start();
include '../koneksi.php';
include '../fungsi.php';
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
              <h4>FORM PROJECT</h4>
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
                    $query = "SELECT * FROM project
                              INNER JOIN kategori ON project.id_kategori = kategori.id_kategori 
                              INNER JOIN project_case ON project.id_case = project_case.id_case 
                              INNER JOIN tb_tracking ON project.id_tracking = tb_tracking.id_tracking 
                              INNER JOIN pegawai ON project.id_pegawai = pegawai.id_pegawai 
                              INNER JOIN tb_priority On project.id_priority = tb_priority.id_priority
                              ORDER BY id_project
                    ";
                    $query_run = mysqli_query($conn, $query);
                    ?>
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th class="text-center">Nama Project</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Case</th>
                            <th class="text-center">Assignee</th>
                            <th class="text-center">Priority</th>
                            <!-- <th class="text-center">Nominal</th> -->
                            <th class="text-center">Start Date</th>
                            <th class="text-center">Due Date</th>
                            <th class="text-center">Status</th>
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
                            <td class="text-center"><?php echo $d['deskripsii']; ?></td>
                            <td class="text-center"><?php echo $d['nama_kategori']; ?></td>
                            <td class="text-center"><?php echo $d['nama_case']; ?></td>
                            <td class="text-center"><?php echo $d['nama_pegawai']; ?></td>
                            <td class="text-center"><?php echo $d['nama_priority']; ?></td>
                            <!-- <td class="text-center"><?php echo buatRp($d['nominal']); ?></td> -->
                            <td class="text-center"><?php echo $d['start_date']; ?></td>
                            <td class="text-center"><?php echo $d['due_date']; ?></td>
                            <td class="text-center">
                            <?php
                            if($d['nama_tracking'] =='Pending'){
                              echo "<span class='badge badge-secondary'>{$d['nama_tracking']}</span>";
                            }elseif($d['nama_tracking'] =='Pengerjaan'){
                              echo "<span class='badge badge-primary'>{$d['nama_tracking']}</span>";
                            }elseif($d['nama_tracking'] =='Testing'){
                              echo "<span class='badge badge-info'>{$d['nama_tracking']}</span>";
                            }elseif($d['nama_tracking'] =='Deploy'){
                              echo "<span class='badge badge-warning'>{$d['nama_tracking']}</span>";
                            }elseif($d['nama_tracking'] =='Finish'){
                              echo "<span class='badge badge-success'>{$d['nama_tracking']}</span>";
                            }
                          ?>
                            <td align="center">
                            <a href="edit_project.php?id=<?php echo $d['id_project']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>
                            <a href="delete_project.php?id=<?php echo $d['id_project']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>Delete</a>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Data Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="insert_project.php" method="post" class="form-user" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="nama_project">Nama Project</label>
                            <input type="text" name="nama_project" class="form-control" id="nama_project" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="deskripsii">Deskripsi</label>
                            <input type="text" name="deskripsii" class="form-control" id="deskripsii" required>
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
                        <!-- <div class="form-group">
                            <label>Nominal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    Rp.
                                  </div>
                                </div>
                                <input type="text" name="nominal" class="form-control" id="nominal" required>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label" for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="due_date">Due Date</label>
                            <input type="date" name="due_date" class="form-control" id="due_date" required>
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