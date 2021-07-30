<?php
//start session
session_start();

// import db config file
include_once '../db/config.php';

// put form data into variables

$user_or_email = mysqli_real_escape_string($conn, $_POST['user_or_email']);
$password = md5($_POST['password']);

if (!empty($user_or_email) && !empty($password)) { // check if all inputs are fiiled.
    // check if username or email are exist.
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$user_or_email}' OR user_email = '{$user_or_email}'");

    if (mysqli_num_rows($sql) > 0) {
        // check if username or email and password are matched.
        $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$user_or_email}' AND user_password = '{$password}'");

        if (mysqli_num_rows($sql2) > 0) {

            // check if all match.
            $row = mysqli_fetch_assoc($sql2); // fetch user data.
            $_SESSION['unique_id'] = $row['unique_id'];

            $time=time()+10;
            $sql3 = mysqli_query($conn, "UPDATE users SET status='Active Now', last_login = {$time} WHERE unique_id = {$row['unique_id']}") or die('Querry failed In login.php file!');

            echo 'Success'; // Return Success.

        } else {
            echo 'Password incorrect.';
        }
    } else {
        echo "User not registred !";
    }
} else {
    echo "Please put all information.";
}
 