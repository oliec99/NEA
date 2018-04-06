<?php

if (isset($_POST['submit'])){
    
    include_once 'dbh.inc.php';
    
    $booking = mysqli_real_escape_string($conn, $_POST['booking']);
    
    //Error handlers
    //Check for empty fields
    if (empty($booking)){
        header("Location: ../adminsettings.php?removebooking=empty");
        exit();
    }else{
        $sql = "DELETE FROM bookings WHERE booking_id='$booking'";
        $result = mysqli_query($conn, $sql);
        header("Location: ../adminsettings.php?booking=removed");
        exit();
    }
    
}else{
    header("Location: ../adminsettings.php");
    exit();
}