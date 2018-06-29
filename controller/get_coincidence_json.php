<?php
require_once "connect_db.php";
session_start();

$nb_user = $_POST['nb_user'];
//$nb_user = 1;
$current_time = date("Y-m-d");
$current_year = date("Y");
$starttime=$current_time . "08:00:00";
$endtime=$current_year . "-12-31 20:00:00";
header('Content-type:application/json');

echo "[\n";
for($start = strtotime($starttime); $start <= strtotime($endtime);$start += 3600)  //我这里是按每小时遍历，所以每次增加3600秒
{
    $thistime = date('Y-m-d H:i:s',$start);
    $nexttime = date('Y-m-d H:i:s',$start+3600);
    $thisdate = date('Y-m-d');
    $arr_trans_key = array();
    $arr_trans_key['title'] = " ";
    $nblibre=0;
    for ($i=0; $i < $nb_user ; $i++) {
      $temp = "Email_user".$i;
      $nb_mail = $_POST[$temp];
      //$nb_mail="ruolinzheng96@gmail.com";
      $sql_id = "SELECT id, first_name FROM users WHERE email='{$nb_mail}' ";
      $result = mysqli_query($connection,$sql_id);
      $result_tab = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $owner_id = $result_tab['id'];
      $owner_name = $result_tab['first_name'];

      $sql_events = "SELECT * FROM events WHERE owner_id='{$owner_id}'
                     AND ((events.start BETWEEN '{$thistime}' AND '{$nexttime}') OR (events.end BETWEEN '{$thistime}' AND '{$nexttime}') OR (events.start<'{$thistime}'AND events.end >'{$nexttime}')) ";

      $result = mysqli_query($connection,$sql_events);
      $nb_rows = $result->num_rows;

      //libre
      if($nb_rows===0){

        $arr_trans_key['title']= $arr_trans_key['title']."  ".$owner_name;

        $nblibre++;
      }
      $arr_trans_key['start'] = $thistime;
      $arr_trans_key['end'] = $nexttime;
      $arr_trans_key['allDay'] = false;
      //$arr_trans_key['color'] = 'blue';
    }
    //default(transparent), important(red), chill(pink), success(green), info(blue)
    if($nblibre==$nb_user){
      $arr_trans_key['className'] = 'success';
    }elseif ($nblibre==0) {
      $arr_trans_key['className'] = 'important';
    }else {
      $arr_trans_key['className'] = 'info';
    }
    $array_json = json_encode($arr_trans_key);
    echo $array_json;
    echo "\n";
    if ($start!==strtotime($endtime)){
      echo ",\n";
    }
}
echo "]";
die;
// $sql_events = "SELECT * FROM events WHERE owner_id='{$_SESSION['id']}' ";
// $result = mysqli_query($connection,$sql_events);
// $nb_rows = $result->num_rows;
// header('Content-type:application/json');
//
// echo "[\n";
//  $i=0;
// while ($result_tab = mysqli_fetch_array($result,MYSQLI_ASSOC)){
//   $i = $i+1;
//   $arr_trans_key = array();
//
//   $arr_trans_key['title'] = $result_tab['summary'];
//   $arr_trans_key['start'] = $thistime;
//   $arr_trans_key['end'] = $nexttime;
//   $arr_trans_key['allDay'] = false;
//   $arr_trans_key['color'] = 'blue';
//
//   $array_json = json_encode($arr_trans_key);
//   echo $array_json;
//   echo "\n";
//   if ($i!==$nb_rows){
//     echo ",\n";
//   }
//
//   //var_dump($result_tab);
// }
//
// echo "]";




 ?>
