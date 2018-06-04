<?php
session_start();
require_once "connect_db.php";
$_SESSION['firstName'] = $_POST['firstName'];
$_SESSION['familyName'] = $_POST['familyName'];
$_SESSION['email'] = $_POST['email'];
$add_user_email_sql = "INSERT INTO `tx`.`users` (`id`, `gid`, `password`, `first_name`, `last_name`, `email`)
        VALUES (NULL, NULL, '{$_POST['password']}', '{$_SESSION['firstName']}', '{$_SESSION['familyName']}', '{$_SESSION['email']}')";

if (mysqli_query($connection, $add_user_email_sql)) {

} else {
    echo "Error: " . $add_user_email_sql . "<br>" . mysqli_error($connection);
}

header('Location: ../index.php');
//header('Location: ../calendar/fullcalendar.html');
exit();
 ?>
