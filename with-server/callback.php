<?php
require_once __DIR__.'/../vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfig(__DIR__.'/../client_secret.json');
$client->addScope('profile');

$client->authenticate($_GET['code']);
$token = $client->getAccessToken();

if ($token) {
	$token_data = $client->verifyIdToken();
	echo "<pre>";
	print_r($token);
	print_r($token_data);
	echo "</pre>";
} else {
	echo 'invalid';
}


