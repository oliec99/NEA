<?php

if (isset($_POST['submit'])){
    
    include_once 'dbh.inc.php';
    
    $equipment = mysqli_real_escape_string($conn, $_POST['equipment']);
    
    //Error handlers
    //Check for empty fields
    if (empty($equipment)){
        header("Location: ../adminsettings.php?remove=empty");
        exit();
    }else{
        $sql = "DELETE FROM faults WHERE equipment_id='$equipment'";
        $result = mysqli_query($conn, $sql);
        header("Location: ../adminsettings.php?fault=removed");
        exit();
    }
    
}else{
    header("Location: ../equipmentadd.php");
    exit();
}