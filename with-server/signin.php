<?php 

require_once __DIR__.'/../vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfig(__DIR__.'/../client_secret.json');
$client->addScope('profile');
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/login/with-server/callback.php');
$auth_url = $client->createAuthUrl();
header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
exit();
