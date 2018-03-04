<?php
	include_once 'header.php'
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Settings</h2>
		<?php
			if (($_SESSION['u_uid']) =='admin'){
				echo "<h3>Change and Modify Settings</h3>
					<form class='adminsettings-form' action='includes/adminsettings.inc.php' method='POST'>
						<select id='type' name='functionality'>
							<option value='0'>Select Functionality of Studio</option>
							<option value='fullyFunc'>Fully Functional</option>
							<option value='partialFunc'>Partially Functional</option>
							<option value='notFunc'>Out of Use</option>
						</select>
						<button type='submit' name ='submit'>Add</button>
					</form>";
			}else{
				echo "<h3>You must be an admin to access this page</h3>";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
