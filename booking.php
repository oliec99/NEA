<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Book the Studio</h2>
		<h3>Please select when you would like to book the studio.</h3>
		<?php
			if (isset($_SESSION['u_id'])){
				echo '<form class="booking-form" action="includes/booking.inc.php" method="POST">
					<input type="date" name="date" required min=
						<?php
							echo date("Y-m-d");
						?>
					<select id="period" name="period">                      
  						<option value="0">Select the Period You Wish to Book</option>
  						<option value="p1">Period 1</option>
  						<option value="p2">Period 2</option>
  						<option value="p3">Period 3</option>
  						<option value="p3.5">Lunch</option>
  						<option value="p4">Period 4</option>
  						<option value="p5">Period 5</option>
  						<option value="p6">After School</option>
					</select><style>.booking-form select{width: 100%; height: 40px; padding: 0px 5%; margin-bottom: 4px; border: none; background-color: #fff; font-family: arial; font-size: 16px; color: #111; line-height: 40px;}</style>
					<button type="submit" name"submit">Book</button><style>.booking-form button{display: block; margin: 0 auto; width: 30%; height: 40px; border: none; background-color: #222; font-family: arial; font-size: 16px; color: #fff; cursor: pointer;}';
			}else{
				echo "<h3>You must be logged in to book the studio.</h3>";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
