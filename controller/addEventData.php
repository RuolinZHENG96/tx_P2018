
<?php
session_start();
require_once "connect_db.php";

//check if the event_id is unique
$event_id = create_event_id(20);
$sql_check = "SELECT * FROM events WHERE event_id='{$event_id}' ";
$result_check = mysqli_query($connection,$sql_check);
while($result_check!=NULL){
  $event_id = create_event_id(20);
  $sql_check = "SELECT * FROM events WHERE event_id='{$event_id}' ";
  $result_check = mysqli_query($connection,$sql_check);
}

echo $event_id;

$sql_events = "INSERT INTO `tx`.`events` (`event_id`, `owner_id`, `start`, `start_date`, `start_time`, `end`, `end_date`, `end_time`, `summary`, `location`, `description`, `is_same_day`)
VALUES ('{$event_id}', '{$_SESSION['id']}', '{$_COOKIE['start_time[0]']}', '', '', '{$_COOKIE['end_time[0]']}', '', '', '{$_COOKIE['title']}', '{$_COOKIE['place']}', '{$_COOKIE['description']}', '1') ";
$result = mysqli_query($connection,$sql_events);




function create_event_id($id_length) {
  $randid="";
  for ($i = 0; $i < $id_length; $i++)
  {
  $randid .= chr(mt_rand(48, 122));
  }
  return $randid;
}
header('Location: http://localhost/GoogleLogin/index.php');
 ?>
