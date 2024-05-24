<?php
session_start();
ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);
require '../config/functions.php';
$curl = curl_init();
$error = [];
if (isset($_GET['package'])) {
    $id = filterData($_GET['package']);
    $user = $_SESSION['user'];
    $amountSql = "SELECT  `Package_price` FROM `package` WHERE `Package_id` = ?";
    $amountSql = sqlSelector($amountSql,'s',$id);
    $amount = round($amountSql[0]['Package_price']*1.18);
    $userDetails = "SELECT  `userId`, `name`, `email`, `phone` FROM `users` WHERE `secret_key` = ?";
    $userDetails = sqlSelector($userDetails,'s',$user)[0];
            $expert_id = '';
            $status = "Active";
            $userId = $userDetails['userId'];
            $email = $userDetails['email'];
            $phone = $userDetails['phone'];
            curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.cashfree.com/pg/orders",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 50,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"customer_details\":{\"customer_id\":\"$userId\",\"customer_email\":\"$email\",\"customer_phone\":\"$phone\"},\"order_amount\":$amount,\"order_currency\":\"INR\",\"order_note\":\"$user\"}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/json",
    "x-api-version: 2022-01-01",
    "x-ratelimit-limit: 30",
    "x-ratelimit-remaining: 29",
    "x-ratelimit-retry: 0",
    "x-ratelimit-type: 207809d3a66e4627762d1d7def908702",
    "x-client-id: 207809d3a66e4627762d1d7def908702",
     "x-client-secret: 7fcbd0d236a487977476db522220ad4c919fa201"
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
            $sql = "UPDATE `users` SET `order_id`='".$orderToken."' WHERE `secret_key` = ?";
            $insert_id = sqlUpdate($sql,'s',$user);
            if($insert_id>0){
                ?>
                <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Millionaire Track</title>
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
        window.location.href = "cashfree-payment-check.php?order_id=" + data.order.orderId+'&order='+orderToken;
    }else if(data.order){
        alert('failed');
    } else {
        //order is still active
        alert("Order is ACTIVE");
        //window.location.href = "checkstatus.php?order_id=" + data.order.orderId+'&order='+orderToken;
    }
}
let failure = function(data) {
   alert('Payment Failed');
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
                <?php
            }
            else{
                ?>
                <script>
                    alert('Something Went Wrong');
                    //window.location.href = "../register.php";
                </script>
                <?php
            }
        
}
?>