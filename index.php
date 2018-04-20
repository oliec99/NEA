<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
	date_default_timezone_set("Europe/London");
	$date = date('Y-m-d');
	$rawTime = date('H:i:s');
	$sql0 = "SELECT timetable_id FROM timetable WHERE '$rawTime' BETWEEN timetable_start AND timetable_end";
	$result0 = mysqli_query($conn, $sql0);
	$rawPeriodTime = mysqli_fetch_assoc($result0);
	$periodTime = $rawPeriodTime['timetable_id'];
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

			$sql1 = "SELECT booking_id FROM bookings WHERE booking_date='$date' AND timetable_id='$periodTime'";
			$result1 = mysqli_query($conn, $sql1);
			$resultCheck1 = mysqli_num_rows($result1);

			if ($resultCheck1 > 0){
				$free = 0;
				$busy = 1;
			}else{
				$free = 1;
				$busy = 0;
			}

			$sql3 = "SELECT MAX(fault_severity) FROM faults";
			$result3 = mysqli_query($conn, $sql3);
			$rawMaxSeverity = mysqli_fetch_assoc($result3);
			$maxSeverity = $rawMaxSeverity['MAX(fault_severity)'];

			if ($maxSeverity == 1){
				$fullyFunc = 0;
				$partialFunc = 1;
				$notFunc = 0;
			}elseif ($maxSeverity == 2){
				$fullyFunc = 0;
				$partialFunc = 0;
				$notFunc = 1;
			}			

			if (isset($_SESSION['u_uid'])){
				echo "<h3> Welcome, ";
				echo $_SESSION['u_first'];
				echo " ";
				echo $_SESSION['u_last'];
				echo"</h3>";
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

						  var options = {'title':'Current Studio Availability', 'width':1000, 'height':400};

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
