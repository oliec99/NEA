<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Settings</h2>
		<?php
			if (isset($_SESSION['u_uid'])){
				if (($_SESSION['u_uid']) =='admin'){
					$sql="SELECT equipment_id FROM faults";
					$result=mysqli_query($conn, $sql);
					echo "<h3>Change and Modify Settings</h3>
						<form class='view-faults' action='faultview.php' method='POST'>
						<button type='submit' name='submit'>View Faults</button>
						</form>
							<form class='removefault-form' action='includes/adminsettings.inc.php' method='POST'>";
					
					echo "<select id='equipment' name='equipment'>
						<option value='0'>Select Equipment</option>";
				while ($row = mysqli_fetch_array($result)){
					echo "<option value'" . $row['equipment_id'] ."'>" . $row['equipment_id'] ."</option>";
				}

				echo "</select>";

			

				echo "<button type='submit' name ='submit'>Remove Fault</button>";

				echo "</form>";

				$sql="SELECT booking_id FROM bookings";
				$result=mysqli_query($conn, $sql);
				echo "<form class='removebooking-form' action='includes/adminsettingsbookings.inc.php' method='POST'>";
				
				echo "<select id='booking' name='booking'>
					<option value='0'>Select Booking</option>";
				while ($row = mysqli_fetch_array($result)){
					echo "<option value'" . $row['booking_id'] ."'>" . $row['booking_id'] ."</option>";
				}

				echo "</select>";

				echo "<button type='submit' name ='submit'>Remove Booking</button>";

				echo "</form>";

				$sql="SELECT user_uid FROM users";
				$result=mysqli_query($conn, $sql);
				echo "<form class='removeuser-form' action='includes/adminsettingsusers.inc.php' method='POST'>";
				
				echo "<select id='users' name='users'>
					<option value='0'>Select User</option>";
				while ($row = mysqli_fetch_array($result)){
					echo "<option value'" . $row['user_uid'] ."'>" . $row['user_uid'] ."</option>";
				}

				echo "</select>";

				echo "<button type='submit' name ='submit'>Remove User</button>";

				echo "</form>";
				$sql="SELECT equipment_id FROM equipment";
				$result=mysqli_query($conn, $sql);
				echo "<form class='removeequipment-form' action='includes/adminsettingsequipment.inc.php' method='POST'>";
				
				echo "<select id='equipment' name='equipment'>
					<option value='0'>Select Equipment</option>";
				while ($row = mysqli_fetch_array($result)){
					echo "<option value'" . $row['equipment_id'] ."'>" . $row['equipment_id'] ."</option>";
				}

				echo "</select>";

				echo "<select id='quantity' name='quantity'>
						<option value='0'>Select Quantity</option>
						<option value='1'>- 1</option>
						<option value='1'>- 2</option>
						<option value='1'>- 3</option>
						<option value='1'>- 4</option>
						<option value='1'>- 5</option>
						<option value='1'>- 6</option>
						<option value='1'>- 7</option>
						<option value='1'>- 8</option>
						<option value='1'>- 9</option>
						<option value='1'>- 10</option>
						</select>";


				echo "<button type='submit' name ='submit'>Remove Equipment</button>";

				echo "</form>";
				}else{
					echo "<h3>You must be an admin to access this page</h3>";
				}


			}else{
				echo "<h3>You must be an admin to access this page</h3>";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
