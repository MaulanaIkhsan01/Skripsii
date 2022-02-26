<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="Dashboard.php"></i> <span class="logo-name"><?php echo $_SESSION['level']; ?></span>

        </a>
    </div>
    <div class="sidebar-user">
        <div class="sidebar-user-picture">
            <img alt="image" src="../assets/img/profile/<?php echo $_SESSION['image']; ?>">
        </div>
        <div class=" sidebar-user-details">
            <div class="user-name"><?php echo $_SESSION['username']; ?></div>
            <div class="user-role"><?php echo $_SESSION['level']; ?></div>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Administrator</li>
        <li class="dropdown">
            <a href="Dashboard.php" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a class="nav-link" href="project.php"><i data-feather="database"></i><span>Data Project</span></a>
        </li>

        <!-- <li class="menu-header">User</li> -->
        <li class="menu-header">Master Data</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i data-feather="command"></i><span>Master Data</span></a>
            <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="pegawai.php"><i data-feather="database"></i><span>Data Pegawai</span></a>
            </li>
            <li>
                <a class="nav-link" href="kategori.php"><i data-feather="database"></i><span>Data Kategori</span></a>
            </li>
            <li>
                <a class="nav-link" href="jabatan.php"><i data-feather="database"></i><span>Jabatan</span></a>
            </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i data-feather="command"></i><span>Metode Fuzzy</span></a>
            <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="variabel.php"><i data-feather="database"></i><span>Data Variabel</span></a>
            </li>
            <li>
                <a class="nav-link" href="rule.php"><i data-feather="database"></i><span>Rules</span></a>
            </li>
            <li>
                <a class="nav-link" href="penilaian.php"><i data-feather="database"></i><span>Penilaian</span></a>
            </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i data-feather="command"></i><span>Metode Oreste</span></a>
            <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="kriteria.php"><i data-feather="database"></i><span>Nilai Bobot Kriteria</span></a>
            </li>
            <li>
                <a class="nav-link" href="alternatif.php"><i data-feather="database"></i><span>Nilai Bobot Alternatif</span></a>
            </li>
            <li>
                <a class="nav-link" href="hasil.php"><i data-feather="database"></i><span>Hasil</span></a>
            </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i data-feather="command"></i><span>Metode KNN</span></a>
            <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="knnkriteria.php"><i data-feather="database"></i><span>Kriteria</span></a>
            </li>
            <li>
                <a class="nav-link" href="knnsubkriteria.php"><i data-feather="database"></i><span>Sub Kriteria</span></a>
            </li>
            <li>
                <a class="nav-link" href="knndataset.php"><i data-feather="database"></i><span>DataSet</span></a>
            </li>
            <li>
                <a class="nav-link" href="knnhitung.php"><i data-feather="database"></i><span>Perhitungan Knn</span></a>
            </li>
            </ul>
        </li>
        <li class="menu-header">Cetak Laporan</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i data-feather="command"></i><span>Laporan</span></a>
            <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="cetak_pegawai.php" target="_blank"><i data-feather="database"></i><span>Laporan Data Pegawai</span></a>
            </li>
            <li>
                <a class="nav-link" href="cetak_project.php" target="_blank"><i data-feather="database"></i><span>Laporan Project </span></a>
            </li>
            
            </ul>
        </li>
        <!-- <li>
            <a class="nav-link" href="variabel.php"><i data-feather="database"></i><span>Data Variabel</span></a>
        </li> -->


        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->

        <!-- <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="printer"></i><span>Cetak</span></a>
              <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="laporan/cetak.php" target="_blank">Cetak Data Karyawan</a></li>
                <li><a class="nav-link" href="index2.html"></a></li>
              </ul>
            </li> -->
        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>
    </ul>
</aside>