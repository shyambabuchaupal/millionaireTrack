<?php
require 'config/functions.php';
$ch = curl_init();
$cars = '';
$Reson = 'InValid IFSC Code';
echo $sql = "SELECT * FROM `usersaccount` WHERE `admin_status` =' '";
$result_data = sqlSelector($sql);
foreach($result_data as $data){
$account_id = $data['Account_id'];
$IFSC = $data['accountIFSC'];
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, "https://ifsc.razorpay.com/$IFSC");
$res = curl_exec($ch);  

$data_array = json_decode($res,true);

if(is_array($data_array)){
   $status = '1';
}else{
    $status = '2';
}
echo $Updatesql = "UPDATE `usersaccount` set `admin_status`=?, `reson`=? where Account_id=?";
sqlUpdate($Updatesql,'sss',$status,$Reson,$account_id);
}
echo $sql = "SELECT * FROM `usersaccount` WHERE `admin_status` ='2'";
$result_data = sqlSelector($sql);
foreach($result_data as $data){
$account_id = $data['Account_id'];
$IFSC = $data['accountIFSC'];
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, "https://ifsc.razorpay.com/$IFSC");
$res = curl_exec($ch);  

$data_array = json_decode($res,true);

if(is_array($data_array)){
   $status = '1';
}else{
    $status = '2';
}
echo $Updatesql = "UPDATE `usersaccount` set `admin_status`=?, `reson`=? where Account_id=?";
sqlUpdate($Updatesql,'sss',$status,$Reson,$account_id);
}
curl_close($ch);
?>