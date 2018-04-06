<?php

if (isset($_POST['submit'])){
    
    include_once 'dbh.inc.php';
    
    $user = mysqli_real_escape_string($conn, $_POST['users']);
    
    //Error handlers
    //Check for empty fields
    if (empty($user)){
        header("Location: ../adminsettings.php?removeuser=empty");
        exit();
    }else{
        $sql = "DELETE FROM users WHERE user_uid='$user'";
        $result = mysqli_query($conn, $sql);
        header("Location: ../adminsettings.php?user=removed");
        exit();
    }
    
}else{
    header("Location: ../adminsettings.php");
    exit();
}