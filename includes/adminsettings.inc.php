<?php

if (isset($_POST['submit'])){
	
	include_once 'dbh.inc.php';
	
	$fullyFunc = mysqli_real_escape_string($conn, $_POST['fullyFunc']);
	$partialFunc = mysqli_real_escape_string($conn, $_POST['partialFunc']);
	$notFunc = mysqli_real_escape_string($conn, $_POST['notFunc']);