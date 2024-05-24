<?php
session_start();
$user = $_SESSION['user'];
require '../config/functions.php';
if(isset($_POST['updateProfile'])){
    $name = filterData($_POST['name']);
    $phone = filterData($_POST['phone']);
    $city = filterData($_POST['city']);
    $address = filterData($_POST['address']);
    if($_FILES['profile']['error']==0){
    $img = file_get_contents($_FILES['profile']['tmp_name']);
    $fileName = 'MT000'.time().'.png';
    file_put_contents('../images/'.$fileName,$img);
        $updateDetails = "UPDATE `users` SET `name`=?,`phone`=?,`city`=?,`address`=?,`profile`=? WHERE `secret_key` = ?";
        $updateRes = sqlUpdate($updateDetails,'ssssss',$name,$phone,$city,$address,$fileName,$user);
    }
    else{
    $updateDetails = "UPDATE `users` SET `name`=?,`phone`=?,`city`=?,`address`=? WHERE `secret_key` = ?";
    $updateRes = sqlUpdate($updateDetails,'sssss',$name,$phone,$city,$address,$user);
    }
    if($updateRes){
        header('LOCATION:../edit-profile.php');
        // die('success=Profile Updated');
    }
    else{
        die('error=Something Went Wrong');
    }
}
?>