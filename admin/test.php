<script type="text/javascript" src="../assets/chartjs/Chart.js"></script>


<div class="block-content">
                1
                <canvas id="myChart"></canvas>
                    
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
					$Pengerjaan = mysqli_query($koneksi,"select * from pinjaman where id_tracking ='3'");
					echo mysqli_num_rows($Pengerjaan);
					?>,
                    <?php 
					$Testing = mysqli_query($koneksi,"select * from pinjaman where id_tracking ='4'");
					echo mysqli_num_rows($Testing);
                    ?>,
                    <?php 
					$Deploy = mysqli_query($koneksi,"select * from pinjaman where id_tracking ='5'");
					echo mysqli_num_rows($Deploy);
                    ?>,
                    <?php 
					$Finish = mysqli_query($koneksi,"select * from pinjaman where id_tracking ='6'");
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