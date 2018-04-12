<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>View Bookings</h2>
		<table>
			<tr>
				<th>Booking Date</th>
				<th>Booking Time</th>
				<th>Booked By</th>
			</tr>
			<?php
				$sql = "SELECT booking_date, timetable_id, user_uid FROM bookings";
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)){
						echo "<tr><td>".$row["booking_date"] . "</td><td>".$row["timetable_id"]."</td><td>".$row["user_uid"]."</td></tr>";
					}
					echo "</table>";
				}else{
					echo "<h3>No Bookings Have Been Made</h3>";
				}
			?>
		</table>
	</div>
</section>







<?php
	include_once 'footer.php';
?>
