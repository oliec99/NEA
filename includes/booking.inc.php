<?php
	session_start();
	if (isset($_POST['submit'])){
	
	include_once 'dbh.inc.php';
	
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$period = mysqli_real_escape_string($conn, $_POST['period']);
	$bookingid = $period . $date;
	$uid = ($_SESSION['u_uid']);
	$fulfilled = FALSE;
	//Error handlers
	//Check for empty fields
	if (empty($date) || empty($period)){
		header("Location: ../booking.php?booking=empty");
		exit();
	}else{
		$sql = "SELECT * FROM bookings WHERE booking_id='$bookingid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
				
		if ($resultCheck > 0){
			header("Location: ../booking.php?booking=alreadybooked");
			exit();
		}else{			
			$sql = "INSERT INTO bookings (booking_id, user_uid, booking_date, timetable_id) VALUES ('$bookingid', '$uid', '$date', '$period');";
			mysqli_query($conn, $sql);
			header("Location: ../booking.php?booking=success");
			exit();
		}	
	}
	
}else{
	header("Location: ../booking.php");
	exit();
}
