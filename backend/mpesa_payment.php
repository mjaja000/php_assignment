<?php
// backend/mpesa_payment.php
// Processes M-Pesa payments using the Safaricom Daraja API
header('Content-Type: application/json');
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decode JSON data from the POST request
    $data = json_decode(file_get_contents("php://input"));
    $phone = $data->phone;
    $amount = $data->amount;

    // M-Pesa API credentials (replace these with your actual credentials)
    $consumerKey = 'YOUR_CONSUMER_KEY';
    $consumerSecret = 'YOUR_CONSUMER_SECRET';
    $shortCode = 'YOUR_SHORT_CODE';
    $passkey = 'YOUR_PASSKEY';
    $timestamp = date("YmdHis");

    // Generate the password by encoding the short code, passkey, and timestamp
    $password = base64_encode($shortCode . $passkey . $timestamp);

    // Obtain an access token from Safaricom's API
    $credentials = base64_encode($consumerKey . ':' . $consumerSecret);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials");
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Basic " . $credentials]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $access_token = json_decode($response)->access_token;

    // Prepare the STK push request data
    $apiUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $requestData = [
        'BusinessShortCode' => $shortCode,
        'Password'          => $password,
        'Timestamp'         => $timestamp,
        'TransactionType'   => 'CustomerPayBillOnline',
        'Amount'            => $amount,
        'PartyA'            => $phone,
        'PartyB'            => $shortCode,
        'PhoneNumber'       => $phone,
        'CallBackURL'       => 'http://localhost/muruugi_school/backend/mpesa_callback.php', // Update with your callback URL
        'AccountReference'  => 'MuruugiPrimary',
        'TransactionDesc'   => 'School Fee Payment'
    ];
    $jsonData = json_encode($requestData);

    // Execute the STK push request via cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    $apiResponse = curl_exec($ch);
    if(curl_errno($ch)) {
        $result = ["status" => "error", "message" => curl_error($ch)];
    } else {
        $result = json_decode($apiResponse, true);
    }
    curl_close($ch);

    // Return the response from Safaricom as JSON
    echo json_encode($result);
}
?>
