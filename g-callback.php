<?php
	require_once "config.php";

	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);

	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: login.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	$_SESSION['gid'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['firstName'] = $userData['givenName'];

	$service = new Google_Service_Calendar($gClient);
	$calendarId = 'primary';

  //echo '<iframe src="https://www.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=' . $userData['email'] . '&amp;color=%232952A3&amp;ctz=Europe%2FParis" style=" border-width:0 " width="800" height="600" frameborder="0" scrolling="no"></iframe>';

	$optParams = array(
	  // 'maxResults' => 10,
	  'orderBy' => 'startTime',
	  'singleEvents' => true,
	  // 'timeMin' => date('c'),
	);
	$results = $service->events->listEvents($calendarId);
	var_dump($results);die;
	// if (empty($results->getItems())) {
	//     print "No upcoming events found.\n";
	// } else {
	//     print "Upcoming events:\n";
	//     foreach ($results->getItems() as $event) {
	//         $start = $event->start->dateTime;
	//         if (empty($start)) {
	//             $start = $event->start->date;
	//         }
	//         printf("%s (%s)\n", $event->getSummary(), $start);
	//     }
	// }
// 	$event = new Google_Service_Calendar_Event(array(
//   'summary' => 'Google I/O 2015',
//   'location' => '800 Howard St., San Francisco, CA 94103',
//   'description' => 'A chance to hear more about Google\'s developer products.',
//   'start' => array(
//     'dateTime' => '2015-05-28T09:00:00-07:00',
//     'timeZone' => 'America/Los_Angeles',
//   ),
//   'end' => array(
//     'dateTime' => '2015-05-28T17:00:00-07:00',
//     'timeZone' => 'America/Los_Angeles',
//   ),
//   'recurrence' => array(
//     'RRULE:FREQ=DAILY;COUNT=2'
//   ),
//   'attendees' => array(
//     array('email' => 'lpage@example.com'),
//     array('email' => 'sbrin@example.com'),
//   ),
//   'reminders' => array(
//     'useDefault' => FALSE,
//     'overrides' => array(
//       array('method' => 'email', 'minutes' => 24 * 60),
//       array('method' => 'popup', 'minutes' => 10),
//     ),
//   ),
// ));
//
// $calendarId = 'primary';
// $event = $service->events->insert($calendarId, $event);
// printf('Event created: %s\n', $event->htmlLink);
// 	die;
	require_once "controller/add_user_google.php";
	header('Location: index.php');
	exit();
?>
