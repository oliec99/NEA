<?php
	include_once 'header.php'
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Equipment</h2>
		<?php
			if (isset($_SESSION['u_id'])){
				echo "<h3>Add Equipment</h3>
					<form class='equipmentadd-form' action='includes/equipmentadd.inc.php' method='POST'>
						<input type='text' name='name' placeholder='Equipment Name'></input>
						<select id='type' name='type'>
							<option value='0'>Select Type of Equipment</option>
							<option value='mic'>Microphone</option>
							<option value='cable'>Cable</option>
							<option value='stand'>Stand</option>
							<option value='control'>Control Room</option>
						</select>
						<select id='quantity' name='quantity'>
							<option value='0'>Select the Quantity of Equipment</option>
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
							<option value='4'>4</option>
							<option value='5'>5</option>
							<option value='6'>6</option>
							<option value='7'>7</option>
							<option value='8'>8</option>
							<option value='9'>9</option>
							<option value='10'>10</option>
						</select>
						<button type='submit' name'submit'>Add</button>
					</form>";
			}else{
				echo "<h3>Please Login or Signup to view this page</h3>";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
