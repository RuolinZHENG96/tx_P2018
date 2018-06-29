<?php
require_once "connect_db.php";
session_start();
if(isset($_POST["Email"])){
  $sql_id = "SELECT id FROM users WHERE email='{$_POST['Email']}' ";
  $result = mysqli_query($connection,$sql_id);
  $result_tab = mysqli_fetch_array($result,MYSQLI_ASSOC);  
  $this_id = $result_tab['id'];
}else {
  $this_id = $_SESSION['id'];
}
$sql_days = "SELECT * FROM days WHERE owner_id='{$this_id}' ";
$result = mysqli_query($connection,$sql_days);
$nb_rows = $result->num_rows;
header('Content-type:application/json');

echo "[\n";
 $i=0;
 $date_tab = array();
while ($result_tab = mysqli_fetch_array($result,MYSQLI_ASSOC)){

  $arr_trans_key = array();

  $arr_trans_key['Date'] = $result_tab['date'];
  $arr_trans_key['Availability'] = (int)$result_tab['freemin']/60;
  $date_tab[$i]=$result_tab['date'];

  $i = $i+1;

  $array_json = json_encode($arr_trans_key);
  echo $array_json;
  echo "\n";
  // if ($i!==$nb_rows){
    echo ",\n";
//  }

  //var_dump($result_tab);
}


$current_date = date("Y-m-d");
$current_year = date("Y");

$mystartdate=$current_date;
$myenddate = $current_year . "-12-31";


    for($start = strtotime($mystartdate); $start <= strtotime($myenddate);$start += 86400)
    {


        if(!in_array(date("Y-m-d",$start),$date_tab)){
          $arr_trans_key = array();
          $arr_trans_key['Date'] = date("Y-m-d",$start);
          $arr_trans_key['Availability'] = 720/60;
          $array_json = json_encode($arr_trans_key);
          echo $array_json;
          echo "\n";
          if ($start!==strtotime($myenddate)){
            echo ",\n";
          }
        }


    }
    $arr_trans_key = array();
    $arr_trans_key['Date'] = $myenddate;
    $arr_trans_key['Availability'] = 720/60;
    $array_json = json_encode($arr_trans_key);
    echo $array_json;
    echo "\n";

echo "]";
//$test = mysqli_fetch_array($result,MYSQLI_NUM);
//var_dump($test[1]);

// $id = $result_tab['id'];





 ?>
