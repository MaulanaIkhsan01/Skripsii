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
            <!-- <div class="user-role"><?php echo $_SESSION['level']; ?></div> -->
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header"></li>
        <li class="dropdown">
            <a href="Dashboard.php" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i data-feather="command"></i><span>Project</span></a>
            <ul class="dropdown-menu">
                <li>
                    <a class="nav-link" href="project.php">Project</a>
                </li>
                <li>
                    <a class="nav-link" href="task.php">Task</a>
                </li>
                
            </ul>
        </li>
        <!-- <li class="dropdown">
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
        </li> -->
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i data-feather="command"></i><span>Metode KNN</span></a>
            <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="knnhitung.php"><i data-feather="database"></i><span>Perhitungan Knn</span></a>
            </li>
            </ul>
        </li>
        <!-- <li class="dropdown">
            <a class="nav-link" href=""><i data-feather="printer"></i><span>Cetak Laporan</span></a>
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