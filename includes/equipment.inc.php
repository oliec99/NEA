<?php

session_start();

if (isset($_POST['submit'])){
    
    include_once 'dbh.inc.php';
    
    $equipment = mysqli_real_escape_string($conn, $_POST['equipment']);
    $severity = mysqli_real_escape_string($conn, $_POST['severity']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $uid = $_SESSION['u_uid'];
    
    //Error handlers
    //Check for empty fields
    if (empty($equipment) || empty($severity) || empty($quantity)){
        header("Location: ../equipmentadd.php?add=empty");
        exit();
    }else{
        $sql = "SELECT * FROM faults WHERE equipment_id='$equipment'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        $sql2 = "SELECT equipment_quantity FROM equipment WHERE equipment_id = '$equipment'";
        $result2 = mysqli_query($conn, $sql2);
        $rawOriginalQuantity = mysqli_fetch_assoc($result2);
        $originalQuantity = $rawOriginalQuantity['equipment_quantity'];

        if ($quantity > $originalQuantity){
            header("Location: ../equipment.php?fault=invalidquantity");
            exit();
        }elseif ($resultCheck > 0){
            header("Location: ../equipment.php?fault=alreadyreported");
            exit();
        }else{
            $sql = "INSERT INTO faults (equipment_id, fault_severity, user_uid ) VALUES ('$equipment', '$severity', '$uid');";
            mysqli_query($conn, $sql);
            header("Location: ../equipment.php?fault=reported");
            exit();

        }

        
    }
    
}else{
    header("Location: ../equipmentadd.php");
    exit();
}