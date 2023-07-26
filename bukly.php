<?php
$phonenumbers = ['0768168060', '0113015674'];
$num = 0;


function sendSms($phone, $message)
{
    $Url = "https://api.umeskiasoftwares.com/api/v1/sms";
    $ch = curl_init($Url);
    $data = array(
        'api_key' => 'SVQ4WVpPQUQ6NnpicDJsMm8=', // Corrected: Encode the API key
        'email' => 'alvo967@gmail.com',
        'Sender_Id' => '23107',
        'message' => $message,
        'phone' => $phone,
    );
    $payload = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    } else {
        curl_close($ch);
        $data = json_decode($result);

        if ($data->success) { // Corrected: Use boolean check for success
            $request_id = $data->request_id;
            $message = $data->message;
           // echo "Sms sent successfully, with request_id: " . $request_id . " and message: " . $message . "";
        } else {
            $ResultCode = $data->ResultCode;
            $errorMessage = $data->errorMessage;
           // echo "Sms not sent, with ResultCode: " . $ResultCode . " and errorMessage: " . $errorMessage . "";
        }
    }
}

while ($num < count($phonenumbers)) {
   $phone = $phonenumbers[$num]; // Corrected: Access individual phone number
   $message = "This is a Bulk SMS $num";
    sendSms($phone, $message); // Corrected: Pass individual phone number to the function
    $num++;
}

echo "Sms sent successfully";
?>
