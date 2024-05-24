<?php
ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);
 chmod("cashfree-payment-check.php",0644);
require '../config/functions.php';
$curl = curl_init();
curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.cashfree.com/pg/orders/" . $_GET["order_id"],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/json",
    "x-api-version: 2021-05-21",
    "x-client-id: 207809d3a66e4627762d1d7def908702",
     "x-client-secret: 7fcbd0d236a487977476db522220ad4c919fa201"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
if ($err) {
//   echo json_encode(array("error" => 1));
//   echo "cURL Error #:" . $err;
echo'<script>alert("There is Some Error")</script>';
  die();

} else {
     $result = json_decode($response, true);
  $orderStatus = $result["order_status"];
  $orderToken = $result["order_token"];
  if($orderStatus=='PAID'){
      //webhook area start
      $account_id = $result['cf_order_id'];
    $payment_id = $result['order_token'];
    $payment_amount = round($result['order_amount']/1.18);
    
    $payment_order_id = $result['order_token'];
    $payment_method = $result['order_id'];
    $payment_email = $result['customer_details']['customer_email'];
    $payment_acquirer_data = json_encode($result['order_note']);
    $payment_user_id = $result['customer_details']['customer_id'];
    $payment_secret_key = $result['order_note'];
    $sql = "SELECT `Package_id`FROM `package` WHERE `Package_price` = ?";
    $package = sqlSelector($sql,'s',$payment_amount);
    $packageId = $package[0]['Package_id'];
    $secret_id = md5($payment_user_id.time());
    $secret_id = $payment_secret_key;
    $sql = "INSERT INTO `payment_details` SET `account_id`=?,`payment_id`=?,`payment_amount`=?,`order_id`=?,`method`=?,`email`=?,`acquirer_data`=?,`user_id`=?";
      if(sqlInsert($sql,'ssssssss',$account_id,$payment_id,$payment_amount,$payment_order_id,$payment_method,$payment_email,$payment_acquirer_data,$payment_user_id)){
        $sql = "UPDATE `users` SET `secret_key`=?,`package`=?,`status`='ACTIVE' WHERE `secret_key` = ? AND `order_id` =? AND `userId` =?";
        $activeSql = sqlUpdate($sql,'sssss',$secret_id,$packageId,$payment_secret_key,$payment_order_id,$payment_user_id);
        if($activeSql){
            $DirectIdSql = "SELECT `sponsorId`,`name` FROM `users` WHERE `userId` = ? AND `order_id` = ?";
            $DirectIdRes = sqlSelector($DirectIdSql,'ss',$payment_user_id,$payment_order_id);
            $DirectId = $DirectIdRes[0]['sponsorId'];
            $buyer_name  = $DirectIdRes[0]['name'];
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
            $directValue = $directValue[0]['Direct'];
            $PassiveAmount = "SELECT `passive` FROM `package` WHERE `Package_id` = ?";
            $passiveValue = sqlSelector($PassiveAmount,'s',$PassivePackage);
            $passiveValue = $passiveValue[0]['passive'];
            $statusCheck = "SELECT `status`,`name`,`email`,`package` FROM `users` WHERE `userId` = '$DirectId'";
            $directtatus = sqlSelector($statusCheck);
            if(($directtatus[0]['package'])>=0){
            $DirectCommissionSql = "INSERT INTO `reference` SET `User_id`=?,`Reff_User_id`=?,`Account_id`=?,`Ref_amount`=?,`Level_from`='Direct',`Amount_transfer_Date`=NUll,`Payment_Status`='Pending',`Payment_unpaid`='1',`Payment_paid`='0',`Ref_process`='API',`date`='',`status`='1',`payment_id`=?";
            $directCommissionInsert = sqlInsert($DirectCommissionSql,'sssss',$payment_user_id,$DirectId,$account_id,$directValue,$payment_id);
            $to = $directtatus[0]['email'];
            $mail_one_username = $directtatus[0]['name'];
            $subject = "Congratulations !!";
            $message = "<img src='https://millionairetrack.com/user/images/email-img.jpeg' style='height:110px;'><br><br>" .
                "Hey, " . $mail_one_username . "<br><br>" .
                "We hope you are doing well today:)<br><br>" .
                "Many Many Congratulations !!! <br><br>" .
                "You've received a new Referal for account (" . $mail_one_username . ")<br><br>" .
                "Customer Name: " . $buyer_name . "<br>" .
                "Affiliate Profit: " . $directValue . "INR<br>" .
                "<b>NOTE :- This Profit will be paid to your Bank Account in the upcoming Pay-Out - Cycle .</b><br><br>" .
                "(Keep Crushing and Keep Learning)<br><br>" .
                "Regard <br>" .
                "Team Millionaire Track ";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: <info@millionairetrack.com> ' . "\n";
            mail($to, $subject, $message, $headers);
            }
            $statusCheck = "SELECT `status`,`name`,`email`,`package` FROM `users` WHERE `userId` = '$PassiveId'";
            $directtatus = sqlSelector($statusCheck);
            if(($directtatus[0]['package'])>=0){
            $PassiveCommissionSql = "INSERT INTO `reference` SET `User_id`=?,`Reff_User_id`=?,`Account_id`=?,`Ref_amount`=?,`Level_from`='Passive',`Amount_transfer_Date`=NUll,`Payment_Status`='Pending',`Payment_unpaid`='1',`Payment_paid`='0',`Ref_process`='API',`date`='',`status`='1',`payment_id`=?";
            $directCommissionInsert = sqlInsert($PassiveCommissionSql,'sssss',$payment_user_id,$PassiveId,$account_id,$passiveValue,$payment_id);
            $to = $directtatus[0]['email'];
            $mail_one_username = $directtatus[0]['name'];
            $subject = "Congratulations !!";
            $message = "<img src='https://millionairetrack.com/user/images/email-img.jpeg' style='height:110px;'><br><br>" .
                "Hey, " . $mail_one_username . "<br><br>" .
                "We hope you are doing well today:)<br><br>" .
                "Many Many Congratulations !!! <br><br>" .
                "You've received a new Referal for account (" . $mail_one_username . ")<br><br>" .
                "Customer Name: " . $buyer_name . "<br>" .
                "Affiliate Profit: " . $passiveValue . "INR<br>" .
                "<b>NOTE :- This Profit will be paid to your Bank Account in the upcoming Pay-Out - Cycle .</b><br><br>" .
                "(Keep Crushing and Keep Learning)<br><br>" .
                "Regard <br>" .
                "Team Millionaire Track ";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: <info@millionairetrack.com> ' . "\n";
            mail($to, $subject, $message, $headers);
                
            }
        }
        else{
           // echo"<script>alert('Payment Unsuccess');window.location.href = '../index.php';</script>";
        }
    }
      //webhook area ends
      
  //echo"<script>alert('Payment Success');window.location.href = '../index.php';</script>";
  }else{
      //echo"<script>alert('Payment Unsuccess');window.location.href = '../index.php';</script>";
  }
}
?>