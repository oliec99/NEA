<?php

if (isset($_POST['submit'])){
	
	include_once 'dbh.inc.php';
	
	$make = mysqli_real_escape_string($conn, $_POST['make']);
	$model = mysqli_real_escape_string($conn, $_POST['model']);
	$type = mysqli_real_escape_string($conn, $_POST['type']);
	$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
	$equipmentid = $make . $model . $type;
	
	//Error handlers
	//Check for empty fields
	if (empty($make) || empty($model) || empty($type) || empty($quantity)){
		header("Location: ../equipmentadd.php?add=empty");
		exit();
	}else{
		$sql = "SELECT * FROM equipment WHERE equipment_id='$equipmentid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck > 0){
			$sql = "UPDATE equipment SET equipment_quantity = equipment_quantity + 2 WHERE equipment_id = '$equipmentid';";
			header("Location: ../equipmentadd.php?add=ammended");
			exit();
		}else{
			$sql = "INSERT INTO equipment (equipment_id, equipment_make, equipment_model, equipment_type, equipment_quantity) VALUES ('$equipmentid', '$make', '$model', '$type', $quantity);";
			mysqli_query($conn, $sql);
			header("Location: ../equipmentadd.php?add=success");
			exit();

		}
	}
	
}else{
	header("Location: ../equipmentadd.php");
	exit();
}