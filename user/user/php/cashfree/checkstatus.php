<?php
ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);
 require'../db.php';
$curl = curl_init();
$order = $_GET['order'];
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
    "x-client-id: 193194d143ca39489ef7d056cd491391",
     "x-client-secret: 7264f133d6eb74c7788b5f4fce50d6680bad2874"
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
  if($orderStatus=='PAID '){
  echo"<script>alert('Payment Success');window.location.href = '../index.php';</script>";
  }
  else{
      echo"<script>alert('$orderStatus');window.location.href = '../index.php';</script>";
  }
   $sql = "UPDATE `payment_detail` SET `payment_status`='$orderStatus' WHERE `paymet_id` = '$orderToken'";
      mysqli_query($conn,$sql);
  die();
}
?>