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
  <script type="text/javascript" src="../assets/chartjs/Chart.js"></script>


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
      include '../koneksi.php';
      $query2 = $conn->query("SELECT * FROM pegawai");
      $query3 = $conn->query("SELECT * FROM project");
      $query4 = $conn->query("SELECT * FROM jabatan");
      $query5 = $conn->query("SELECT * FROM task");

      
      $jml_user = mysqli_num_rows($query2);
      $jml_project = mysqli_num_rows($query3);
      $jml_jabatan = mysqli_num_rows($query4);
      $jml_task = mysqli_num_rows($query5);
      ?>
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="row ">
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-green-dark">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-user"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">User Account</h4>
                      <span><?php echo number_format($jml_user, 0, ",", "."); ?></span>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-orange-dark">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-building"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Jabatan</h4>
                      <span><?php echo number_format($jml_jabatan, 0, ",", "."); ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-cyan-dark">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Project</h4>
                      <span><?php echo number_format($jml_project, 0, ",", "."); ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-purple-dark">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Task</h4>
                      <span><?php echo number_format($jml_task, 0, ",", "."); ?></span>
                    </div>
                  </div>
                </div>
              </div>
              

            </div>
            <div class="col-xl-10 col-lg-6">
                Grafik Progres Project
                <canvas id="myChart"></canvas>
                    
            </div>
            </div>
          </div>
        </section>
        
      </div>
      <?php include 'footer.php'; ?>
    </div>
  </div>
  <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Pending", "Pengerjaan", "Testing", "Deploy", "Finish"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$Pending = mysqli_query($koneksi,"select * from project where id_tracking ='1'");
					echo mysqli_num_rows($Pending);
					?>, 
					<?php 
					$Pengerjaan = mysqli_query($koneksi,"select * from project where id_tracking ='3'");
					echo mysqli_num_rows($Pengerjaan);
					?>,
                    <?php 
					$Testing = mysqli_query($koneksi,"select * from project where id_tracking ='4'");
					echo mysqli_num_rows($Testing);
                    ?>,
                    <?php 
					$Deploy = mysqli_query($koneksi,"select * from project where id_tracking ='5'");
					echo mysqli_num_rows($Deploy);
                    ?>,
                    <?php 
					$Finish = mysqli_query($koneksi,"select * from project where id_tracking ='6'");
					echo mysqli_num_rows($Finish);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
  <!-- General JS Scripts -->
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