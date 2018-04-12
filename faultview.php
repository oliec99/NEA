<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>View Faults</h2>
		<h3>Fault Severity of 1 is Non-Fundamental and Fault Severity of 2 is Fundamental</h3>
		<table>
			<tr>
				<th>Equipment ID</th>
				<th>Fault Severity</th>
				<th>Reported By</th>
			</tr>
			<?php
				$sql = "SELECT equipment_id, fault_severity, user_uid FROM faults";
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)){
						echo "<tr><td>".$row["equipment_id"] . "</td><td>".$row["fault_severity"]."</td><td>".$row["user_uid"]."</td></tr>";
					}
					echo "</table>";
				}else{
					echo "<h3>No Faults Have Been Reported</h3>";
				}
			?>
		</table>
	</div>
</section>







<?php
	include_once 'footer.php';
?>
