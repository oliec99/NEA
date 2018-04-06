<?php

if (isset($_POST['submit'])){
    
    include_once 'dbh.inc.php';
    
    $equipment = mysqli_real_escape_string($conn, $_POST['equipment']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    settype($quantity, 'integer');
    
    //Error handlers
    //Check for empty fields
    if (empty($equipment) || empty($quantity)){
        header("Location: ../adminsettings.php?removeequipment=empty");
        exit();
    }else{
        $sql = "UPDATE equipment SET equipment_quantity = equipment_quantity - '$quantity' WHERE equipment_id = '$equipment'";
        $sql2 = "DELETE FROM equipment WHERE equipment_id='$equipment'";
        $result = mysqli_query($conn, $sql);
        $sql3 = "SELECT equipment_quantity FROM equipment WHERE equipment_id = '$equipment'";
        $result3 = mysqli_query($conn, $sql3);
        $rawCurrentQuantity = mysqli_fetch_assoc($result3);
        $currentQuantity = $rawCurrentQuantity['equipment_quantity'];
        settype($currentQuantity, 'integer');
        if ($currentQuantity <= 0){
            $result2 = mysqli_query($conn, $sql2);
        }
        header("Location: ../adminsettings.php?equipment=removed");
        exit();
    }
    
}else{
    header("Location: ../adminsettings.php");
    exit();
}