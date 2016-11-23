<?php
require_once __DIR__.'/../vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfig(__DIR__.'/../client_secret.json');
$client->addScope('profile');

var_dump($_GET['code']);

$client->authenticate($_GET['code']);
$token = $client->getAccessToken();

echo "<pre>";
var_dump($token);
echo "</pre>";

if ($token) {
	$token_data = $client->verifyIdToken();
	echo "<pre>";
	var_dump($token_data);
	echo "</pre>";
} else {
	echo 'invalid operation';
}




