<?php
$appId = '207809d3a66e4627762d1d7def908702';
        $secretKey = 'd567403591de4b2bf863b4269350f717f6e1b804'; 
        $url = "https://api.cashfree.com/pg/orders";
    

    $header = array(
        'x-client-id: ' . $appId,
        'x-client-Secret: ' . $secretKey,
        'Content-Type: application/json',
        'x-api-version: 2022-01-01'
    );


    $data = array(
        "orderAmount" => "5",
        "orderCurrency" => "INR",
        "orderNote" => "MT0008",
        "customerName" => "Amit Singh",
        "customerPhone" => "9557990150",
        "customerEmail" => "test@cf.com",
        "notifyUrl" => "https://millionairetrack.com/user/php/cashfreeWebhook.php"
    );
$curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl,  CURLOPT_RETURNTRANSFER, true);
    if (!is_null($data)) curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    $r = curl_exec($curl);
    curl_close($curl);
    print_r($r);

?>