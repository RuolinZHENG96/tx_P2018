<?php

  $sql_id = "SELECT id FROM users WHERE gid=" . $_SESSION['gid'];
  $result = mysqli_query($connection,$sql_id);
  $result_tab = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $id = $result_tab['id'];


  if($id===NULL){


    $sql = "INSERT INTO `tx`.`users` (`id`, `gid`, `password`, `first_name`, `last_name`, `email`)
            VALUES (NULL, '{$_SESSION['gid']}', NULL, '{$_SESSION['firstName']}', '{$_SESSION['familyName']}', '{$_SESSION['email']}')";

    if (mysqli_query($connection, $sql)) {

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

  }


 ?>
