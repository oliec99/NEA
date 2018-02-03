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
					<a href="equipment.php">Equipment</a><style>header nav ul li a{padding-right: 5px; padding-left: 5px;} header nav ul li a:hover{font-weight: bold;}</style>

				</li>
			</ul>
			<div class="nav-login">
				<?php
					if (isset($_SESSION['u_id'])){
						echo '<form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Logout</button>
							</form>';
					}else{
						echo '<form action="includes/login.inc.php" method="POST">
							<input type="text" name="uid" placeholder="Username/e-mail">
							<input type="password" name="pwd" placeholder="Password">
							<button type="submit" name="submit">Login</button>
							</form>
							<a href="signup.php">Signup</a><style>header .nav-login a:hover{font-weight: bold;}</style>';
					}
				?>
				
			</div>
		</div>
</header>