<?php

    $server = 'localhost'; // this may be an ip address instead
    $user = 'root';
    $pass = '';
    $database = 'tx'; // name of your database
    $connection = new mysqli($server, $user, $pass,$database);
    if ($connection->connect_error) {
        die("fail to connect database: " . $connection->connect_error);
    }
    //echo "success to connect database";

?>
