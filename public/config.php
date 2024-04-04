<?php
	/*
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("52777509574-3ffpbgmvqr0qvual0file3i3armqajun.apps.googleusercontent.com");
	$gClient->setCLientSecret("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");
	$gClient->setApplicationName("Website");
	$gClient->setRedirectUri("https://localhost:8080/brgyy72/public/welcome.php");
	*/


require_once 'GoogleAPI/vendor/autoload.php';
require '../include/db_conn.php';

// init configuration
$clientID = '52777509574-3ffpbgmvqr0qvual0file3i3armqajun.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://wilson.ayos-lomboy.com/public/welcome.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


?>
