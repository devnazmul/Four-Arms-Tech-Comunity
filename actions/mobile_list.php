<?php
//start session
session_start();
// import db config file
$user_unique_id = $_SESSION['unique_id'];
include_once '../db/config.php';
$result = '';

// put form data into variables
$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$user_unique_id}"); // querry for all users without logged in user
if (mysqli_num_rows($sql) == 0) { // check an user is active.
    $result .= '<div class="w-full h-12 px-9 sm:px-2 md:px-6 flex justify-center items-center">
                    <h2 class="text-2xl text-gray-700 font-bold">No User Found</h2>
                </div>';
} elseif (mysqli_num_rows($sql) > 0) { // check many users is active.
    while ($row = mysqli_fetch_assoc($sql)) {

        $sql2 = mysqli_query($conn, "SELECT * FROM messages WHERE (incomming_sms_id = {$user_unique_id} AND outgoing_sms_id = {$row['unique_id']}) OR (outgoing_sms_id = {$user_unique_id} AND incomming_sms_id = {$row['unique_id']}) ORDER BY sms_id DESC LIMIT 1"); // querry for all users without logged in user
        if (mysqli_num_rows($sql) > 0) {
            if ($row['status'] == "Offline") {
                if ($row2 = mysqli_fetch_assoc($sql2)) {
                    if ($row2['sms'] == "") {
                        if ($row2['incomming_sms_id'] == $user_unique_id) {
                            $result .= '<a href="mobile_message.php?id=' . $row['unique_id'] . '">
                                            <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                                                <div class="mr-3">
                                                    <div class="overflow-hidden w-14 h-14 mt-2">
                                                        <img class="object-cover rounded-full w-full h-full mr-3 " src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                                        <div class="bg-red-500 border-2 border-gray-900 h-4 w-4 rounded-full float-right relative bottom-4 right-0"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h2 class="text-gray-500 font-bold">' . $row['user_fullname'] . '</h2>
                                                    <span class="text-white lg\:font-light text-gray-700 text-xs font-normal">You: Attachment</span>
                                                </div>
                                            </div>
                                        </a>';
                        } else {
                            $result .= '<a href="mobile_message.php?id=' . $row['unique_id'] . '">
                                            <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                                                <div class="mr-3">
                                                    <div class="overflow-hidden w-14 h-14 mt-2">
                                                        <img class="object-cover rounded-full w-full h-full mr-3" src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                                        <div class="bg-red-500 border-2 border-gray-900 h-4 w-4 rounded-full float-right relative bottom-4 right-0"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h2 class="text-gray-100 font-bold">' . $row['user_fullname'] . '</h2>
                                                    <span class="text-white lg\:font-light text-xs font-normal">Attachment</span>
                                                </div>
                                            </div>
                                        </a>';
                        }
                    } else {
                        if ($row2['incomming_sms_id'] == $user_unique_id) {
                            $result .= '<a href="mobile_message.php?id=' . $row['unique_id'] . '">
                                            <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                                                <div class="mr-3">
                                                    <div class="overflow-hidden w-14 h-14 mt-2">
                                                        <img class="object-cover rounded-full w-full h-full mr-3" src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                                        <div class="bg-red-500 border-2 border-gray-900 h-4 w-4 rounded-full float-right relative bottom-4 right-0"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h2 class="text-gray-500 font-bold">' . $row['user_fullname'] . '</h2>
                                                    <span class="text-white lg\:font-light text-gray-700 text-xs font-normal">You: ' . $row2['sms'] . '</span>
                                                </div>
                                            </div>
                                        </a>';
                        } else {
                            $result .= '<a href="mobile_message.php?id=' . $row['unique_id'] . '">
                                            <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                                                <div class="mr-3">
                                                    <div class="overflow-hidden w-14 h-14 mt-2">
                                                        <img class="object-cover rounded-full w-full h-full mr-3" src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                                        <div class="bg-red-500 border-2 border-gray-900 h-4 w-4 rounded-full float-right relative bottom-4 right-0"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h2 class="text-gray-100 font-bold">' . $row['user_fullname'] . '</h2>
                                                    <span class="text-white lg\:font-light text-xs font-normal">' . $row2['sms'] . '</span>
                                                </div>
                                            </div>
                                        </a>';
                        }
                    }
                } else {
                    $result .= '<a href="mobile_message.php?id=' . $row['unique_id'] . '">
                                        <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                                            <div class="mr-3">
                                                <div class="overflow-hidden w-14 h-14 mt-2">
                                                    <img class="object-cover rounded-full w-full h-full mr-3" src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                                    <div class="bg-red-500 border-2 border-gray-900 h-4 w-4 rounded-full float-right relative bottom-4 right-0"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="text-gray-500 font-bold">' . $row['user_fullname'] . '</h2>
                                                <span class="text-white lg\:font-light text-gray-700 text-xs">Start your conversation</span>
                                            </div>
                                        </div>
                                    </a>';
                }
            } else {
                if ($row2 = mysqli_fetch_assoc($sql2)) {
                    if ($row2['sms'] == "") {
                        if ($row2['incomming_sms_id'] == $user_unique_id) {

                            $result .= '<a href="mobile_message.php?id=' . $row['unique_id'] . '">
                                        <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                                            <div class="mr-3">
                                                <div class="overflow-hidden w-14 h-14 mt-2">
                                                    <img class="object-cover rounded-full w-full h-full mr-3 " src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                                    <div class="bg-green-500 border-2 border-gray-900 h-4 w-4 rounded-full float-right relative bottom-4 right-0"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="text-gray-500 font-bold">' . $row['user_fullname'] . '</h2>
                                                <span class="text-white lg\:font-light text-gray-700 text-xs font-normal">You: Attachment</span>
                                            </div>
                                        </div>
                                    </a>';
                        } else {
                            $result .= '<a href="mobile_message.php?id=' . $row['unique_id'] . '">
                                        <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                                            <div class="mr-3">
                                                <div class="overflow-hidden w-14 h-14 mt-2">
                                                    <img class="object-cover rounded-full w-full h-full mr-3" src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                                    <div class="bg-green-500 border-2 border-gray-900 h-4 w-4 rounded-full float-right relative bottom-4 right-0"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="text-gray-100 font-bold">' . $row['user_fullname'] . '</h2>
                                                <span class="text-white lg\:font-light text-xs font-normal">Attachment</span>
                                            </div>
                                        </div>
                                    </a>';
                        }
                    } else {
                        if ($row2['incomming_sms_id'] == $user_unique_id) {
                            $result .= '<a href="mobile_message.php?id=' . $row['unique_id'] . '">
                                        <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                                            <div class="mr-3">
                                                <div class="overflow-hidden w-14 h-14 mt-2">
                                                    <img class="object-cover rounded-full w-full h-full mr-3" src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                                    <div class="bg-green-500 border-2 border-gray-900 h-4 w-4 rounded-full float-right relative bottom-4 right-0"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="text-gray-500 font-bold">' . $row['user_fullname'] . '</h2>
                                                <span class="text-white lg\:font-light text-gray-700 text-xs font-normal">You: ' . $row2['sms'] . '</span>
                                            </div>
                                        </div>
                                    </a>';
                        } else {
                            $result .= '<a href="mobile_message.php?id=' . $row['unique_id'] . '">
                                        <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                                            <div class="mr-3">
                                                <div class="overflow-hidden w-14 h-14 mt-2">
                                                    <img class="object-cover rounded-full w-full h-full mr-3" src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                                    <div class="bg-green-500 border-2 border-gray-900 h-4 w-4 rounded-full float-right relative bottom-4 right-0"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="text-gray-100 font-bold">' . $row['user_fullname'] . '</h2>
                                                <span class="text-white lg\:font-light text-xs font-normal">' . $row2['sms'] . '</span>
                                            </div>
                                        </div>
                                    </a>';
                        }
                    }
                } else {
                    $result .= '<a href="mobile_message.php?id=' . $row['unique_id'] . '">
                                    <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                                        <div class="mr-3">
                                            <div class="overflow-hidden w-14 h-14 mt-2">
                                                <img class="object-cover rounded-full w-full h-full mr-3" src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                                <div class="bg-green-500 border-2 border-gray-900 h-4 w-4 rounded-full float-right relative bottom-4 right-0"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <h2 class="text-gray-500 font-bold">' . $row['user_fullname'] . '</h2>
                                            <span class="text-white lg\:font-light text-gray-700 text-xs">Start your conversation</span>
                                        </div>
                                    </div>
                                </a>';
                }
            }
        }
    }
} else {
    $result .= '<div class="w-full h-12 mt-10 px-9 flex justify-center items-center">
                    <h2 class="text-2xl text-gray-700 font-bold">No Active User Available</h2>
                </div>';
}
echo $result;