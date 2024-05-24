<?php
ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);
$curl = curl_init();
$name = $_POST['name'];
$email =$_POST['email'];
$phno = $_POST['phno'];
$amount = round($_POST['TXN_AMOUNT']);
$CUST_ID = $_POST['CUST_ID'];
$id = uniqid();
curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.cashfree.com/pg/orders",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"customer_details\":{\"customer_id\":\"$id\",\"customer_email\":\"$email\",\"customer_phone\":\"$phno\"},\"order_amount\":$amount,\"order_currency\":\"INR\",\"order_note\":\"$CUST_ID\"}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/json",
    "x-api-version: 2022-01-01",
    "x-client-id: 159201e5226c7130cb503859ef102951",
     "x-client-secret: c70a697f4db1ce7d8b99314e828a71b570fdda07"
  ],
]);
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo json_encode(array("error" => 1));
  echo "cURL Error #:" . $err;
  $orderToken = 'Try After Sometimes';
  die();

} else {
  $result = json_decode($response, true);
  $orderToken = $result["order_token"];
}
require '../db.php';
$sql = "INSERT INTO `payment_detail` SET `name`='$name',`amount`='$amount',`added_on`='".date('Y-M-D')."',`purpose`='$CUST_ID',`type`='CashFree',`email`='$email',`number`='$phno',`paymet_id`='$orderToken'";
mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Times Study</title>
   <style>
        #payment-form{
position: fixed;
top: 50%;
left: 50%;
transform: translate(-50%,-50%);
width: 340px;
box-shadow: 0px 0px 14px 2px #d9e6f4;
        }
        </style>
  </head>
  <body>
      <div style = "display:flex;justify-content:center;">
          <img src = "../images/logo1.png" width ="340"/>
      </div>
    <div id="payment-form"></div>
    <div style = "display:flex;justify-content:center;">
    <button id="pay-btn">Pay</button>
      </div>
      
    <!--<script src="https://sdk.cashfree.com/js/ui/1.0.20/dropinClient.sandbox.js"></script>-->
    <script src="https://sdk.cashfree.com/js/ui/1.0.26/dropinClient.prod.js"></script>
  </body>
  <script>
      let orderToken = "<?=$orderToken?>";
const cashfree = new Cashfree();
const paymentDom = document.getElementById("payment-form");
const success = function(data) {
    if (data.order && data.order.status == "PAID") {
        //console.log(data);
        window.location.href = "checkstatus.php?order_id=" + data.order.orderId+'&order='+orderToken;
    }else if(data.order){
        alert('failed');
    } else {
        //order is still active
        alert("Order is ACTIVE");
        //window.location.href = "checkstatus.php?order_id=" + data.order.orderId+'&order='+orderToken;
    }
}
let failure = function(data) {
   // window.location.href = "checkstatus.php?order_id=" + data.order.orderId+'&order='+orderToken;
}
document.getElementById("pay-btn").addEventListener("click", () => {
    const dropConfig = {
        "components": [
            "order-details",
            "card",
            "netbanking",
            "app",
            "upi"
        ],
        "orderToken": orderToken,
        "onSuccess": success,
        "onFailure": failure,
        "style": {
            "backgroundColor": "#ffffff",
            "color": "#11385b",
            "fontFamily": "Lato",
            "fontSize": "14px",
            "errorColor": "#ff0000",
            "theme": "light", //(or dark)
        }
    }
    cashfree.initialiseDropin(paymentDom, dropConfig);

})
window.onload = function() {
   document.getElementById("pay-btn").click();
}
  </script>
</html>