<?php
	session_start();
	require_once "controller/connect_db.php";
	require_once "GoogleAPI/vendor/autoload.php";
	require_once "GoogleAPI/vendor/google/apiclient-services/src/Google/Service/Calendar/Calendar.php";
	$gClient = new Google_Client();
	$gClient->setClientId("954349598856-dvnu066dr68g6198doe1c55seck2q5q6.apps.googleusercontent.com");
	$gClient->setClientSecret("7CHQNlRz1W1leZlQeGdJ3rtY");
	$gClient->setApplicationName("Temps Libre");
	$gClient->setRedirectUri("http://localhost/GoogleLogin/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/calendar");

?>
