<?php

if (isset($_POST['submit'])){
	
	include_once 'dbh.inc.php';
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$type = mysqli_real_escape_string($conn, $_POST['type']);
	$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
	$equipmentid = $name . $type;
	
	//Error handlers
	//Check for empty fields
	if (empty($name) || empty($type) || empty($quantity)){
		header("Location: ../equipmentadd.php?signup=empty");
		exit();
	}else{
		$sql = "SELECT * FROM equipment WHERE equipment_id='$equipmentid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck > 0){
			$sql = "INSERT INTO equipment (equipment_quantity) VALUES (equipment_quantity + '$quantity');";
			mysqli_query($conn, $sql);
			header("Location: ../equipmentadd.php?add=success");
			exit();
		}else{
			$sql = "INSERT INTO equipment (equipment_id, equipment_name, equipment_type, equipment_quantity) VALUES ('$equipmentid', ('$name'), ('$type'), ('$quantity'));";
			mysqli_query($conn, $sql);
			header("Location: ../equipmentadd.php?add=success");
			exit();

		}
	}
	
}else{
	header("Location: ../equipmentadd.php");
	exit();
}