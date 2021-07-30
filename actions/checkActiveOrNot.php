<?php
//start session
session_start();
// import db config file
include_once '../db/config.php';
$user_unique_id = $_SESSION['unique_id'];

// import user last login +6s from current time
$time=time()+10;
// Update last_login Time
$sql = mysqli_query($conn, "UPDATE users SET last_login = {$time} WHERE unique_id = {$user_unique_id}") or die('Querry failed In checkActiveOrNot.php file!');


// Update Status Offline if Last_login Time is less than current time
$current_time = time();
$sql2 = mysqli_query($conn, "UPDATE users SET status = 'Offline' WHERE last_login < {$current_time}") or die('Querry failed In checkActiveOrNot.php file!');