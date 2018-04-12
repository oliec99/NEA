<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Studio Booking | Fallibroome Academy</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Home</a>
					<a href="booking.php">Booking</a>
					<a href="equipment.php">Equipment Fault</a>
					<a href="equipmentadd.php">Add Equipment</a>
					<a href="adminsettings.php">Settings</a>

				</li>
			</ul>
			<div class="nav-login">
				<?php
					if (isset($_SESSION['u_uid'])){
						echo '<form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Logout</button>
							</form>';
						if (($_SESSION['u_uid']) =='admin'){
							echo '<a href="signup.php">User</a>';
						}
					}else{
						echo '<form action="includes/login.inc.php" method="POST">
							<input type="text" name="uid" placeholder="Username/e-mail">
							<input type="password" name="pwd" placeholder="Password">
							<button type="submit" name="submit">Login</button>
							</form>';
					}
				?>
				
			</div>
		</div>
</header>