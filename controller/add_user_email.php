<?php
session_start();
require_once "connect_db.php";
$_SESSION['firstName'] = $_POST['firstName'];
$_SESSION['familyName'] = $_POST['familyName'];
$_SESSION['email'] = $_POST['email'];

$sql_id = "SELECT `id` FROM `users` WHERE `email` = '{$_SESSION['email']}' ";
$result = mysqli_query($connection,$sql_id);

$result_tab = mysqli_fetch_array($result,MYSQLI_ASSOC);
$id = $result_tab['id'];


if($id===NULL){
  $add_user_email_sql = "INSERT INTO `tx`.`users` (`id`, `gid`, `password`, `first_name`, `last_name`, `email`)
          VALUES (NULL, NULL, '{$_POST['password']}', '{$_SESSION['firstName']}', '{$_SESSION['familyName']}', '{$_SESSION['email']}')";
  if (mysqli_query($connection, $add_user_email_sql)) {
    $result = mysqli_query($connection,$sql_id);
    $result_tab = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $id = $result_tab['id'];
  } else {
      echo "Error: " . $add_user_email_sql . "<br>" . mysqli_error($connection);
  }
}
else {
  // this email is already subscribed
}
// set user session id
$_SESSION['id'] = $id;
header('Location: ../index.php');
exit();
 ?>
