<?php
	include_once 'header.php'
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Equipment</h2>
		<?php
			if (isset($_SESSION['u_uid'])){
				if (($_SESSION['u_uid']) =='admin'){
					echo "<h3>Add Equipment</h3>
						<form class='equipmentadd-form' action='includes/equipmentadd.inc.php' method='POST'>
							<input type='text' name='make' placeholder='Equipment Make (No Spaces)'></input>
							<input type='text' name='model' placeholder='Equipment Model (No Spaces)'</input>
							<select id='type' name='type'>
								<option value='0'>Select Type of Equipment</option>
								<option value='mic'>- Microphone</option>
								<option value='cable'>- Cable</option>
								<option value='stand'>- Stand</option>
								<option value='control'>- Control Room</option>
							</select>
							<select id='quantity' name='quantity'>
								<option value='0'>Select the Quantity of Equipment</option>
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
							<button type='submit' name ='submit'>Add</button>
						</form>";
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
