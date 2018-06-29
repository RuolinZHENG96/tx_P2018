<?php
require_once "connect_db.php";
session_start();


$sql_events = "SELECT * FROM events WHERE owner_id='{$_SESSION['id']}' ";
$result = mysqli_query($connection,$sql_events);
$nb_rows = $result->num_rows;
header('Content-type:application/json');

echo "[\n";
 $i=0;
while ($result_tab = mysqli_fetch_array($result,MYSQLI_ASSOC)){
  $i = $i+1;
  $arr_trans_key = array();

  $arr_trans_key['title'] = $result_tab['summary'];
  $arr_trans_key['start'] = $result_tab['start'];
  $arr_trans_key['end'] = $result_tab['end'];
  $arr_trans_key['allDay'] = false;
  $arr_trans_key['color'] = '#ffc107';

  $array_json = json_encode($arr_trans_key);
  echo $array_json;
  echo "\n";
  if ($i!==$nb_rows){
    echo ",\n";
  }

  //var_dump($result_tab);
}

echo "]";
//$test = mysqli_fetch_array($result,MYSQLI_NUM);
//var_dump($test[1]);
//die;
// $id = $result_tab['id'];





 ?>
