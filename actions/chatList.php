<?php
//start session
session_start();
// import db config file
include_once '../db/config.php';
$result = '';

// put form data into variables
$sql = mysqli_query($conn, "SELECT * FROM users");
if (mysqli_num_rows($sql) == 1) { // check an user is active.
    $result .= '<div class="w-full h-20 px-9 sm:px-2 md:px-6 flex items-center">
                    <h1>No User Found</h1>
                </div>';
} elseif (mysqli_num_rows($sql) > 0) { // check many users is active.
    while ($row = mysqli_fetch_assoc($sql)) {
        $result .= '<a href="#?id=' . $row['username'] . '">
                        <div  class="w-full h-14 px-9 my-3 sm:px-2 md:px-6 flex items-center">
                            <div class="mr-3">
                                <div class="overflow-hidden w-14 h-14 mt-2">
                                    <img class="object-cover rounded-full w-full h-full  mr-3 border-4 border-gray-700" src="./actions/images/' . $row['user_profilepic'] . '" alt="">
                                    <div class="bg-green-500 border-2 border-gray-700 h-4 w-4 rounded-full float-right relative bottom-4 right-1"></div>
                                </div>
                            </div>
                            <div>
                                <h2 class="text-gray-500 font-bold">' . $row['user_fullname'] .
        '</h2>
                                <span class="text-white lg\:font-light text-gray-700 text-xs">Hello how Are You........</span>
                            </div>
                        </div>
                    </a>';
    }
} else {
    $result .= 'No Active User Available.';
}
echo $result;