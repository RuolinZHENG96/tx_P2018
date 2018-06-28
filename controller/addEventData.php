
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

echo $event_id;die;

$sql_events = "SELECT * FROM events WHERE owner_id='{$_SESSION['id']}' ";
$result = mysqli_query($connection,$sql_events);
// INSERT INTO `tx`.`events` (`event_id`, `owner_id`, `start`, `start_date`, `start_time`, `end`, `end_date`, `end_time`, `summary`, `location`, `description`, `is_same_day`)
// VALUES ('test', '2', '2018-06-29 10:15:00', '2018-06-29', '10:15:00', '2018-06-29 11:15:00', '2018-06-14', '11:15:00', 'ddd', 'ddd', 'ddd', '1');



function create_event_id($id_length) {
  $randid="";
  for ($i = 0; $i < $id_length; $i++)
  {
  $randid .= chr(mt_rand(48, 122));
  }
  return $randid;
}
 ?>
