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
     
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>TASK LIST</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'skripsi_ikhsan');
                    $query = "SELECT * FROM task
                              INNER JOIN project ON task.id_project = project.id_project 
                              INNER JOIN task_status ON task.id_status = task_status.id_status 
                              ORDER BY id_task
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
                            <th class="text-center">Nama Task</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Start Date</th>
                            <th class="text-center">Due Date</th>
                            <th class="text-center">Create By</th>
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
                            <td class="text-center"><?php echo $d['nama_task']; ?></td>
                            <td class="text-center"><?php echo $d['deskripsi']; ?></td>
                            <td class="text-center"><?php echo $d['start_date']; ?></td>
                            <td class="text-center"><?php echo $d['due_date']; ?></td>
                            <td class="text-center"><?php echo $d['create_by']; ?></td>
                            <td class="text-center">
                            <?php
                            if($d['nama_status'] =='Pending'){
                              echo "<span class='badge badge-secondary'>{$d['nama_status']}</span>";
                            }elseif($d['nama_status'] =='Started'){
                              echo "<span class='badge badge-primary'>{$d['nama_status']}</span>";
                            }elseif($d['nama_status'] =='On-Progress'){
                              echo "<span class='badge badge-info'>{$d['nama_status']}</span>";
                            }elseif($d['nama_status'] =='On-Hold'){
                              echo "<span class='badge badge-warning'>{$d['nama_status']}</span>";
                            }elseif($d['nama_status'] =='Done'){
                              echo "<span class='badge badge-success'>{$d['nama_status']}</span>";
                            }
                          ?>
                            </td>
                            <td align="center">
                            <a href="edit_task.php?id=<?php echo $d['id_task']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="delete_task.php?id=<?php echo $d['id_task']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                            </tr>

                           <?php
                           }
                        } else {
                          echo "No record Found";
                        }
                         ?>

                        </tbody>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                          <i class="fa fa-plus"></i>
                            Tambah Data
                        </button>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Data Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="insert_task.php" method="post" class="form-user" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="nama_task">Nama Task</label>
                            <input type="text" name="nama_task" class="form-control" id="nama_task" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_project">Nama Project</label>
                            <select name="id_project" id="id_project" class="form-control" required>
                                <option value=""> --- Pilih Project --- </option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM project");
                                while ($d = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$d['id_project'].'">'.$d['nama_project'].'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="due_date">Due Date</label>
                            <input type="date" name="due_date" class="form-control" id="due_date" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_status">Status</label>
                            <select name="id_status" id="id_status" class="form-control" required>
                                <option value=""> --- Pilih Status --- </option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM task_status");
                                while ($d = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$d['id_status'].'">'.$d['nama_status'].'</option>';
                                } ?>
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