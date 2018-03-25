<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Settings</h2>
		<?php
			if (($_SESSION['u_uid']) =='admin'){
				$sql="SELECT equipment_id FROM equipment";
				$result=mysqli_query($conn, $sql);
				echo "<h3>Change and Modify Settings</h3>
						<form class='removefault-form' action='includes/adminsettings.inc.php' method='POST'>";
				
				echo "<select id='equipment' name='equipment'>
					<option value='0'>Select Equipment</option>";
			while ($row = mysqli_fetch_array($result)){
				echo "<option value'" . $row['equipment_id'] ."'>" . $row['equipment_id'] ."</option>";
			}

			echo "</select>";

		

			echo "<button type='submit' name ='submit'>Remove Fault</button>";


			}else{
				echo "<h3>You must be an admin to access this page</h3>";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
