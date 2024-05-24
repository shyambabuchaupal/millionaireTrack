<?php
ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);
require '../config/functions.php';
$data = file_get_contents("php://input");
file_put_contents('payment.txt', $data , FILE_APPEND | LOCK_EX);
if (!empty($data)) {
    $data = json_decode($data, true);
    $account_id = $data['account_id'];
    $payment_details = $data['payload']['payment']['entity'];
    $payment_id = $payment_details['id'];
    $payment_amount = $payment_details['amount']/1800;
    $payment_order_id = $payment_details['order_id'];
    $payment_method = $payment_details['method'];
    $payment_email = $payment_details['email'];
    $payment_acquirer_data = json_encode($payment_details['acquirer_data']);
    $payment_user_id = $payment_details['notes']['MTID'];
    $payment_secret_key = $payment_details['notes']['secret_key'];
    $sql = "SELECT `Package_id`FROM `package` WHERE `Package_price` = ?";
    $package = sqlSelector($sql,'s',$payment_amount);
    echo $packageId = $package[0]['Package_id'];
    $secret_id = md5($payment_user_id.time());
    $secret_id = $payment_secret_key;
    $sql = "INSERT INTO `payment_details` SET `account_id`=?,`payment_id`=?,`payment_amount`=?,`order_id`=?,`method`=?,`email`=?,`acquirer_data`=?,`user_id`=?";
    if(sqlInsert($sql,'ssssssss',$account_id,$payment_id,$payment_amount,$payment_order_id,$payment_method,$payment_email,$payment_acquirer_data,$payment_user_id)){
        echo $sql = "UPDATE `users` SET `secret_key`=?,`package`=?,`status`='ACTIVE' WHERE `secret_key` = ? AND `order_id` =? AND `userId` =?";
        echo $activeSql = sqlUpdate($sql,'sssss',$secret_id,$packageId,$payment_secret_key,$payment_order_id,$payment_user_id);
        if($activeSql){
            $DirectIdSql = "SELECT `sponsorId` FROM `users` WHERE `userId` = ? AND `order_id` = ?";
            $DirectIdRes = sqlSelector($DirectIdSql,'ss',$payment_user_id,$payment_order_id);
            $DirectId = $DirectIdRes[0]['sponsorId'];
            //Direct Id Package
            $DirectIdSql = "SELECT `package` FROM `users` WHERE `userId` = ?";
            $DirectIdRes = sqlSelector($DirectIdSql,'s',$DirectId);
            $DirectPackage = $DirectIdRes[0]['package'];
            //compare
            if($packageId<$DirectPackage){
                $DirectPackage = $packageId;
            }
            //passive Id
            $PassiveIdSql = "SELECT `sponsorId` FROM `users` WHERE `userId` = ?";
            $PassiveIdRes = sqlSelector($PassiveIdSql,'s',$DirectId);
            $PassiveId = $PassiveIdRes[0]['sponsorId'];
            //direct Id Package
            $PassiveIdSql = "SELECT `package` FROM `users` WHERE `userId` = ?";
            $PassiveIdRes = sqlSelector($PassiveIdSql,'s',$PassiveId);
            $PassivePackage = $PassiveIdRes[0]['package'];
            //compare
            if($packageId<$PassivePackage){
                $PassivePackage = $packageId;
            }
            $directAmount = "SELECT`Direct` FROM `package` WHERE `Package_id` = ?";
            $directValue = sqlSelector($directAmount,'s',$DirectPackage);
            echo $DirectPackage;
            $directValue = $directValue[0]['Direct'];
            $PassiveAmount = "SELECT `passive` FROM `package` WHERE `Package_id` = ?";
            $passiveValue = sqlSelector($PassiveAmount,'s',$PassivePackage);
            $passiveValue = $passiveValue[0]['passive'];
            echo $DirectCommissionSql = "INSERT INTO `reference` SET `User_id`=?,`Reff_User_id`=?,`Account_id`=?,`Ref_amount`=?,`Level_from`='Direct',`Amount_transfer_Date`=NUll,`Payment_Status`='Pending',`Payment_unpaid`='1',`Payment_paid`='0',`Ref_process`='API',`date`='',`status`='1',`payment_id`=?";
            $PassiveCommissionSql = "INSERT INTO `reference` SET `User_id`=?,`Reff_User_id`=?,`Account_id`=?,`Ref_amount`=?,`Level_from`='Passive',`Amount_transfer_Date`=NUll,`Payment_Status`='Pending',`Payment_unpaid`='1',`Payment_paid`='0',`Ref_process`='API',`date`='',`status`='1',`payment_id`=?";
            $directCommissionInsert = sqlInsert($DirectCommissionSql,'sssss',$payment_user_id,$DirectId,$account_id,$directValue,$payment_id);
            $directCommissionInsert = sqlInsert($PassiveCommissionSql,'sssss',$payment_user_id,$PassiveId,$account_id,$passiveValue,$payment_id);
        }
        else{
            echo 'error1';
        }
    }
    else{
        echo 'error';
    }
}

?>