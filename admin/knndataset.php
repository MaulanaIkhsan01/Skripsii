<?php
session_start();
include '../koneksi.php';
include 'functions.php';

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
                                <h4>FORM KNN DATASET</h4>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="float-left">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modalTambah">
                                                <i class="fa fa-plus"></i>
                                                Tambah Data
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr class="nw">
                                                        <th>Nomor</th>
                                                        <th>Keterangan</th>
                                                        <?php foreach ($ATRIBUT as $key => $val) : ?>
                                                        <th><?= $val->nama_atribut ?></th>
                                                        <?php endforeach ?>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <?php
            $q = esc_field($_GET['q']);
            $rows = $db->get_results("SELECT * FROM tb_dataset WHERE ket_dataset LIKE '%$q%' GROUP BY nomor");
            $dataset = get_dataset();
            foreach ($rows as $row) : ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $row->nomor ?></td>
                                                        <td><?= $row->ket_dataset ?></td>
                                                        <?php foreach ($dataset[$row->nomor] as $k => $v) : ?>
                                                        <td><?= $ATRIBUT_NILAI[$k] ? $NILAI[$v]->nama_nilai : $v ?></td>
                                                        <?php endforeach ?>
                                                        <td align="center">
                                                            <!-- <a href="knndataset_ubah.php?&ID=<?= $row->nomor ?>"
                                                                class="btn btn-info btn-sm"><i
                                                                    class="fa fa-edit"></i></a> -->
                                                            <a href="knndataset_hapus.php?nomor=<?= $row->nomor ?>"
                                                                class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>

                                                    <?php endforeach ?>


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
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked>
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
    <div class="modal fade" id="modalTambah" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Dataset KNN Tambah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php if ($_POST) include 'aksidataset.php' ?>

                <form method="post" class="form-user" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nomor <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="nomor"
                                value="<?= set_value('nomor', $nomor) ?>" />
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input class="form-control" type="text" name="ket_dataset"
                                value="<?= set_value('ket_dataset') ?>" />
                        </div>
                        <?php foreach ($ATRIBUT as $key => $val) : ?>
                        <div class="form-group">
                            <label><?= $val->nama_atribut ?> <span class="text-danger">*</span></label>
                            <?php if ($ATRIBUT_NILAI[$key]) : ?>
                            <select class="form-control" name="nilai[<?= $key ?>]">
                                <option value="">&nbsp;</option>
                                <?= get_nilai_option($key, set_value($_POST['nilai'][$key])) ?>
                            </select>
                            <?php else : ?>
                            <input class="form-control" type="text" name="nilai[<?= $key ?>]"
                                value="<?= $_POST['nilai'][$key] ?>" />
                            <?php endif ?>
                            <?php if ($val->keterangan) : ?>
                            <p class="help-block"><?= $val->keterangan ?></p>
                            <?php endif ?>
                        </div>
                        <?php endforeach ?>
                        <div>
                            <button class="btn btn-primary m-t-15 waves-effect"><span></span> Simpan</button>
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