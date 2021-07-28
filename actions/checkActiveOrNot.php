<?php
//start session
session_start();
// import db config file
include_once '../db/config.php';
$user_unique_id = $_SESSION['unique_id'];
$time=time()+10;
$sql = mysqli_query($conn, "UPDATE users SET last_login = {$time} WHERE unique_id = {$user_unique_id}");
$result = '';

$sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_unique_id}");
$row = mysqli_fetch_assoc($sql2);

if ($row['status'] == 'Offline') {
    $result .='<div class="flex items-center">
                <div>
                    <div class="overflow-hidden w-14 h-14">
                        <img class="object-cover rounded-full w-full h-full  mr-3 border-4 border-gray-700" src="./actions/images/'.$row['user_profilepic'].'" alt="">
                        <div class="bg-red-500 border-2 border-gray-700 h-4 w-4 rounded-full float-right relative bottom-4 right-1">
                        </div>
                    </div>
                </div>
                <div class="ml-3">
                    <h2 class="text-white font-bold">'.$row['user_fullname'].'</h2>
                    <span class="text-white lg\:font-light text-gray-600 text-xs">'.$row['status'].'</span>
                </div>
            </div>';
} else {
    $result .='<div class="flex items-center">
            <div>
                <div class="overflow-hidden w-14 h-14">
                    <img class="object-cover rounded-full w-full h-full  mr-3 border-4 border-gray-700" src="./actions/images/'.$row['user_profilepic'].'" alt="">
                    <div class="bg-green-500 border-2 border-gray-700 h-4 w-4 rounded-full float-right relative bottom-4 right-1">
                    </div>
                </div>
            </div>
            <div class="ml-3">
                <h2 class="text-white font-bold">'.$row['user_fullname'].'</h2>
                <span class="text-white lg\:font-light text-gray-600 text-xs">'.$row['status'].'</span>
            </div>
        </div>';
}
echo $result;