<?php

$token = $_POST['token'];

$ch = curl_init();
curl_setopt_array($ch, array(
	CURLOPT_URL => 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='.$token,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => "GET",
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false
));
$response = curl_exec($ch);
curl_close($ch);

var_dump($response);

$data = json_decode($response);
echo $data->name;