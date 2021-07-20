<?php
session_start();
// import db config file
include_once '../db/config.php';

$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}


if (isset($_SESSION['unique_id'])) {
    $my_id = mysqli_real_escape_string($conn, $_POST['my_id']);
    $others_id = mysqli_real_escape_string($conn, $_POST['others_id']);
    $output = "";
    $sql5 = mysqli_query($conn, "SELECT * FROM messages WHERE (outgoing_sms_id = {$my_id} AND incomming_sms_id = {$others_id}) OR (outgoing_sms_id = {$others_id} AND incomming_sms_id = {$my_id}) ORDER BY sms_id ASC");
    
    $sql6 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$others_id}");

    if (mysqli_num_rows($sql6) > 0) {
        $row2 = mysqli_fetch_assoc($sql6);
    }
    
    
    if (mysqli_num_rows($sql5) > 0) {
        while ($row3 = mysqli_fetch_assoc($sql5)) {
            if ($row3['incomming_sms_id'] == $my_id) {
                if ($row3['sms_file']) {
                    $output .= '<div class="w-full">
                                    <div  class="float-right w-1/2 text-white clear-both ">
                                        <p style="box-shadow:0 0 15px #0007" class="bg-gray-700 my-2 py-3 px-5 rounded-3xl text-left">
                                        '.$row3['sms'].'
                                        <img class="my-5" src="./actions/sms_files/'.$row3['sms_file'].'" alt="">
                                        </p>
                                        <div class="h-10 float-right w-10 relative bottom-6 left-700">
                                            <img class="object-cover rounded-full w-full h-full  mr-3 border-2 border-gray-700" src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                        </div>
                                    </div>
                                </div>';
                } else {
                    $output .= '<div class="w-full">
                                    <div class="float-right w-1/2 text-white clear-both ">
                                        <p style="box-shadow:0 0 15px #0007" class="bg-gray-700 my-2 py-3 px-5 rounded-3xl text-left">
                                        '.$row3['sms'].'
                                        </p>
                                        <div class="h-10 float-right w-10 relative bottom-6 left-700">
                                            <img class="object-cover rounded-full w-full h-full  mr-3 border-2 border-gray-700" src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                        </div>
                                    </div>
                                </div>';
                }
            } else {
                if ($row3['sms_file']) {
                    $output .= '<div class="w-full">
                                    <div class="float-left w-1/2 clear-both">
                                        <p style="box-shadow:0 0 15px #0007" class="bg-gradient-to-r from-green-400 to-blue-500 my-2 p-3 px-5 rounded-3xl text-left">
                                            '.$row3['sms'].'
                                            <img class="my-5" src="./actions/sms_files/'.$row3['sms_file'].'" alt="">
                                        </p>
                                        <div class="h-10 w-10 relative bottom-6 right-3">
                                            <img class="object-cover rounded-full w-full h-full  mr-3 border-2 border-gray-700" src="./actions/images/' . $row2['user_profilepic'] . '" alt="">
                                        </div>
                                    </div>
                                </div>';
                } else {
                    $output .= '<div class="w-full">
                                <div class="float-left w-1/2 clear-both">
                                    <p style="box-shadow:0 0 15px #0007" class="bg-gradient-to-r from-green-400 to-blue-500 my-2 py-3 px-5 rounded-3xl text-left">
                                        '.$row3['sms'].'
                                    </p>
                                    <div class="h-10 w-10 relative bottom-6 right-3">
                                        <img class="object-cover rounded-full w-full h-full  mr-3 border-2 border-gray-700" src="./actions/images/' . $row2['user_profilepic'] . '" alt="">
                                    </div>
                                </div>
                            </div>';
                }
            }
        }
    }


} else {
    header('Location: ../login.php');
}
echo $output;

?>