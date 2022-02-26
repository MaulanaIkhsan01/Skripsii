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
              <h4>Penilaian</h4>
                <div class="card">
                <form action="update_penilaian.php" method="post" class="form-user" enctype="multipart/form-data">
                  <div class="card-header">
                  <?php
                    include '../koneksi.php';
                    $query = "SELECT * FROM pegawai where id_pegawai = $_GET[id]";
                    $query_run = mysqli_query($conn, $query);
                    $result = mysqli_fetch_assoc($query_run);
                    ?>
                  </div>
                  <div class="card-body">
                  <input type="hidden" name="id_pegawai" value="<?php echo $result['id_pegawai']; ?>" class="form-control" required>
                    <div class="form-group">
                      <h5><label class="d-block">Motif Diri</label></h5>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="motifdiri" value="1" id="motifdiri1">
                        <label class="form-check-label" for="motifdiri1">
                           1
                        </label> 
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="motifdiri" value="2" id="motifdiri2">
                        <label class="form-check-label" for="motifdiri2">
                          2
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="motifdiri" value="3" id="motifdiri3">
                        <label class="form-check-label" for="motifdiri3">
                          3
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="motifdiri" value="4" id="motifdiri4">
                        <label class="form-check-label" for="motifdiri4">
                          4
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="motifdiri" value="5" id="motifdiri5">
                        <label class="form-check-label" for="motifdiri5">
                          5
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <h5><label class="d-block">Pengetahuan</label></h5>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="pengetahuan" value="1" id="pengetahuan1">
                        <label class="form-check-label" for="pengetahuan1">
                          1
                        </label> 
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="pengetahuan" value="2" id="pengetahuan2">
                        <label class="form-check-label" for="pengetahuan2">
                          2
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="pengetahuan" value="3" id="pengetahuan3">
                        <label class="form-check-label" for="pengetahuan3">
                          3
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="pengetahuan" value="4" id="pengetahuan4">
                        <label class="form-check-label" for="pengetahuan4">
                          4
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="pengetahuan" value="5" id="pengetahuan5">
                        <label class="form-check-label" for="pengetahuan5">
                          5
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <h5><label class="d-block">Keterampilan</label></h5>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="keterampilan" value="1" id="keterampilan1">
                        <label class="form-check-label" for="keterampilan1">
                          1
                        </label> 
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="keterampilan" value="2" id="keterampilan2">
                        <label class="form-check-label" for="keterampilan2">
                          2
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="keterampilan" value="3" id="keterampilan3">
                        <label class="form-check-label" for="keterampilan3">
                          3
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="keterampilan" value="4" id="keterampilan4">
                        <label class="form-check-label" for="keterampilan4">
                          4
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="keterampilan" value="5" id="keterampilan5">
                        <label class="form-check-label" for="keterampilan5">
                          5
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
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
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <div class="disk-server-setting m-b-20">
                    <p>Disk Space</p>
                    <div class="sidebar-progress">
                      <div class="progress" data-height="5">
                        <div class="progress-bar l-bg-green" role="progressbar" data-width="80%" aria-valuenow="80"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="progress-description">
                        <small>26% remaining</small>
                      </span>
                    </div>
                  </div>
                  <div class="disk-server-setting">
                    <p>Server Load</p>
                    <div class="sidebar-progress">
                      <div class="progress" data-height="5">
                        <div class="progress-bar l-bg-orange" role="progressbar" data-width="58%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="progress-description">
                        <small>Highly Loaded</small>
                      </span>
                    </div>
                  </div>
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