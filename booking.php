<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Book the Studio</h2>
		<h3>Please select when you would like to book the studio.</h3>
		<?php
			if (isset($_SESSION['u_uid'])){
				echo '<form class="booking-form" action="includes/booking.inc.php" method="POST">
					<input type="date" name="date" required min=
						<?php
							echo date("Y-m-d");
						?>';

				
				$sql="SELECT timetable_id FROM timetable";
				$result=mysqli_query($conn, $sql);

				echo "<select id='period' name='period'>
					<option value='0'>Select the Period You Wish to Book</option>";
				while ($row = mysqli_fetch_array($result)){
					echo "<option value'" . $row['timetable_id'] ."'>" . $row['timetable_id'] ."</option>";
				}

				echo "</select>
					<button type='submit' name ='submit'>Book</button>
					</form>";

				echo "<form class='view-booking' action='bookingview.php' method='POST'>
					<button type='submit' name='submit'>View Bookings</button>
					</form>";

							
			}else{
				echo "<h3>You must be logged in to book the studio.</h3>";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
