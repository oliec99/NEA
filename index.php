<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<?php
			if (isset($_SESSION['u_id'])){
				echo "<h3>You are Logged In - Please Proceed to the Booking page";
			}else{
				echo "<h3>Please Login or Signup to book the Recording Studio</h3>";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
