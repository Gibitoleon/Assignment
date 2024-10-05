<?php
function sendEmail( $jsonData){
    $ch = curl_init('http://localhost:4000/main/sendemail'); // Update with your Node.js server URL

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

    // Execute the request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close the cURL session
    curl_close($ch);

      // Handle the response from Node.js server
    if ($httpCode == 200) {
        $responseData = json_decode($response, true);
       return true;
    } else {
       return false;
    }


}