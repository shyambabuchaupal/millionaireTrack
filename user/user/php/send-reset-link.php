<?php
ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);
require '../config/functions.php';
if(isset($_POST['resetUser'])){
    $email = filterData($_POST['email']);
    $sql = "SELECT `userId` FROM `users` WHERE `email` = ?";
    $res = sqlSelector($sql,'s',$email);
    $secret_id = md5($res[0]['userId'].time());
    $forgetId = md5(uniqid().time());
    $updatesql = "UPDATE `users` SET `forget_id`=?,`secret_key`=? WHERE `userId` = ?";
    if(sqlUpdate($updatesql,'sss',$forgetId,$secret_id,$res[0]['userId'])){
        $link = "https://noreply@millionairetrack.com/user/reset-password-callback.php?key=$secret_id&reset=$forgetId";
                $body = "Click on The Link To Reset Your Password \n$link";
                $headers = "From: noreply@millionairetrack.com" . "\r\n" ;
                if(mail($email,"Reset Your The Millionaire Track account",$body,$headers)){
                    echo'<script>alert("Mail Send Successfullly");window.location.href = "../index.php";</script>';
                }
    }
}
?>