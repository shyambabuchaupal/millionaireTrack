<?php
ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);
require '../config/functions.php';
if(isset($_POST['resetUser'])){
    $password = filterData($_POST['password']);
    $conPassword = filterData($_POST['conPassword']);
    $key = filterData($_POST['key']);
    $reset = filterData($_POST['reset']);
    $sql = "SELECT `userId` FROM `users` WHERE `secret_key` = ? AND `forget_id`=?";
    $res = sqlSelector($sql,'ss',$key,$reset);
    if($password==$conPassword){
        $updatesql = "UPDATE `users` SET `password`=? WHERE `userId` = ?";
    if(sqlUpdate($updatesql,'ss',$password,$res[0]['userId'])){
        echo'<script>alert("Password Updated Successfully");window.location.href = "../index.php";</script>';
    }
    else{
        echo'<script>alert("Try After Sometime");</script>';
        // echo'<script>alert("Try After Sometime");window.location.href = "../index.php";</script>';
    }
    }else{
        echo'<script>alert("Password And Confirm Password Does not match");window.location.href = "../index.php";</script>';
    }
}
?>