<?php
	include_once 'header.php'
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Equipment</h2>
		<?php
			if (isset($_SESSION['u_id'])){
				echo "<h3>Report an Equipment Fault</h3>";
			}else{
				echo "<h3>Please Login or Signup to view this page</h3>";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
