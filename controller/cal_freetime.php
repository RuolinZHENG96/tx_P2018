<?php
require_once "connect_db.php";

//initialize days
$current_date = date("Y-m-d");
$current_year = date("Y");
//not inclus the case where an event in two years or more
$sql_get="SELECT `start_date`, `start_time`, `end_time` FROM `tx`.`events` WHERE `owner_id`='{$_SESSION['id']}' AND `start_date` > '{$current_date}' AND `is_same_day` = 1";
if($result_get = mysqli_query($connection,$sql_get)){
  //$result_get = mysqli_query($connection,$sql_get);
  $nb_rows = $result_get->num_rows;
  //$result_tab_get = mysqli_fetch_array($result_get,MYSQLI_ASSOC);

  while ($result_tab_get = mysqli_fetch_array($result_get,MYSQLI_ASSOC)){
      $year =  substr($result_tab_get['start_date'],0,4);
      $year = (int)$year;
      $date = $result_tab_get['start_date'];
      $busymin =  (strtotime($result_tab_get['end_time']) - strtotime($result_tab_get['start_time']))/60;
      $freemin = 720 - $busymin;
      $sql_days="INSERT INTO `tx`.`days` (`owner_id`, `year`, `date`, `freemin`, `busymin`, `totalmin`)
                 VALUES ('{$_SESSION['id']}', '{$year}', '{$date}', '{$freemin}', '{$busymin}', '720')";
      if($result_add_days = mysqli_query($connection,$sql_days)){

      }else {
          echo "Error: " . $sql_days . "<br>" . mysqli_error($connection);
      }
  }
}else {
    echo "Error: " . $sql_get . "<br>" . mysqli_error($connection);
}



 ?>
