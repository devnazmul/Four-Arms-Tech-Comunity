<?php
//start session
session_start();
// import db config file
include_once '../db/config.php';

// put form data into variables
$searchTerm = $_POST['search_term'];

$result = '';

$sql2 = mysqli_query($conn, "SELECT * FROM users WHERE user_fullname LIKE '%{$searchTerm}%' OR user_email LIKE '%{$searchTerm}%'");
if (mysqli_num_rows($sql2) > 0) { // check many users is active.
    while ($row2 = mysqli_fetch_assoc($sql2)) {
        if ($row2['status'] == 'Offline') {
            $result .= '<a href="mobile_message.php?id=' . $row2['unique_id'] . '">
                        <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                            <div class="mr-3">
                                <div class="overflow-hidden w-14 h-14 mt-2">
                                    <img class="object-cover rounded-full w-full h-full mr-3 " src="./actions/images/' . $row2['user_profilepic'] . '" alt="">
                                    <div class="bg-red-500 border-2 border-gray-700 h-4 w-4 rounded-full float-right relative bottom-4 right-0"></div>
                                </div>
                            </div>
                            <div>
                                <h2 class="text-gray-500 font-bold">' . $row2['user_fullname'] . '</h2>
                                <span class="text-white lg\:font-light text-gray-700 text-xs">Hello how Are You........</span>
                            </div>
                        </div>
                    </a>';
        } else {
            $result .= '<a href="mobile_message.php?id=' . $row2['unique_id'] . '">
                        <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                            <div class="mr-3">
                                <div class="overflow-hidden w-14 h-14 mt-2">
                                    <img class="object-cover rounded-full w-full h-full mr-3 " src="./actions/images/' . $row2['user_profilepic'] . '" alt="">
                                    <div class="bg-green-500 border-2 border-gray-700 h-4 w-4 rounded-full float-right relative bottom-4 right-0"></div>
                                </div>
                            </div>
                            <div>
                                <h2 class="text-gray-500 font-bold">' . $row2['user_fullname'] . '</h2>
                                <span class="text-white lg\:font-light text-gray-700 text-xs">Hello how Are You........</span>
                            </div>
                        </div>
                    </a>';
        }
        
    }
} else {
    $result .= '<div class="w-full h-12 px-9 sm:px-2 md:px-6 flex justify-center items-center">
                    <h2 class="text-2xl text-gray-700 font-bold">No User Found</h2>
                </div>';
}
echo $result;
