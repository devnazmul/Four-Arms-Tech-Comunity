<?php
//start session
session_start();
// import db config file
include_once '../db/config.php';
$user_unique_id = $_SESSION['unique_id'];
$time=time()+10;
$sql = mysqli_query($conn, "UPDATE users SET last_login = {$time} WHERE unique_id = {$user_unique_id}");
