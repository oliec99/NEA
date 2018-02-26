<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<?php
			$free = 1;
			$busy = 0;
			$fullyFunc = 1;
			$partialFunc = 0;
			$notFunc = 0;
			if (isset($_SESSION['u_id'])){
				echo "
					<body>
						<div id='availabilityChart'></div>

						<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>

						<script type='text/javascript'>
						google.charts.load('current', {'packages':['corechart']});
						google.charts.setOnLoadCallback(drawChart);

						function drawChart() {
						  var data = google.visualization.arrayToDataTable([
						  ['Status', 'Value'],
						  ['BLUE', 0],
						  ['In Use', $busy],
						  ['AMBER', 0],
						  ['Available', $free]
						]);

						  var options = {'title':'Studio Availability', 'width':1000, 'height':400};

						  var chart = new google.visualization.PieChart(document.getElementById('availabilityChart'));
						  chart.draw(data, options);
						}
						</script>
						<div id='functionChart'></div>

						<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>

						<script type='text/javascript'>
						google.charts.load('current', {'packages':['corechart']});
						google.charts.setOnLoadCallback(drawChart);

						function drawChart() {
						  var data = google.visualization.arrayToDataTable([
						  ['Status', 'Value'],
						  ['BLUE', 0],
						  ['Out of Use', $notFunc],
						  ['Partially Functional', $partialFunc],
						  ['Fully Functional', $fullyFunc]
						]);

						  var options = {'title':'Studio Functionality', 'width':1000, 'height':400};

						  var chart = new google.visualization.PieChart(document.getElementById('functionChart'));
						  chart.draw(data, options);
						}
						</script>";
			}else{
				echo "<h3>Please Login or Signup to book the Recording Studio</h3>";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
