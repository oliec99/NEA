<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Equipment Faults</h2>
		<?php
			if (isset($_SESSION['u_uid'])){
				$sql="SELECT equipment_id FROM equipment";
				$result=mysqli_query($conn, $sql);

				echo "<form class='equipmentfault-form' action='includes/equipment.inc.php' method='POST'>";
				echo "<select id='equipment' name='equipment'>
						<option value='0'>Select Equipment</option>";
				while ($row = mysqli_fetch_array($result)){
					echo "<option value'" . $row['equipment_id'] ."'>" . $row['equipment_id'] ."</option>";
				}
				echo "</select>";
			}
		?>
		<?php
			if (isset($_SESSION['u_uid'])){
				echo "
				<select id='severity' name='severity'>
					<option value='0'>Select Severity of Fault</option>
					<option value='1'>- Not Fundamental to Operation of Studio</option>
					<option value='2'>- Fundamental to Operation of Studio</option>
				</select>
				<select id='quantity' name='quantity'>
					<option value='0'>Select Quantity of Faulty Equipment</option>
					<option value='1'>- 1</option>
					<option value='2'>- 2</option>
					<option value='3'>- 3</option>
					<option value='4'>- 4</option>
					<option value='5'>- 5</option>
					<option value='6'>- 6</option>
					<option value='7'>- 7</option>
					<option value='8'>- 8</option>
					<option value='9'>- 9</option>
					<option value='10'>- 10</option>
				</select>
				<button type='submit' name ='submit'>Report Fault</button>";
			}else{
				echo "<h3>You must be logged in to report a fault.</h3>";
			}
		?>
	</div>
</section>



<?php
	include_once 'footer.php';
?>
