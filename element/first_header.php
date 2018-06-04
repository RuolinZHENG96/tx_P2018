<?php
require_once "controller/connect_db.php";
session_start();

if (!isset($_SESSION['access_token'])){
  if (!isset($_SESSION['email'])){
    header('Location: login.php');
    exit();
  }


} ?>
