<?php
//start session
session_start();

// import db config file
include_once '../db/config.php';

// put form data into variables
$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = md5($_POST['password']);


if (!empty($fullname) && !empty($username) && !empty($email) && !empty($password)) { // Check all filed are filled

    // Is email is already registerd
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '{$email}'");
    if (mysqli_num_rows($sql) > 0) {
        echo $email . " is already registered!";
    } else {

        // Is username is already registerd
        $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");

        if (mysqli_num_rows($sql2) > 0) {
            echo 'Username is already registerd.';
        } else {
            if (isset($_FILES['profile_pic'])) { // check image uploaded or not
                $file_name = $_FILES['profile_pic']['name'];
                $file_type = $_FILES['profile_pic']['type'];
                $file_size = $_FILES['profile_pic']['size'];
                $file_tmp = $_FILES['profile_pic']['tmp_name'];
                $file_ext = end(explode('.', $file_name));
                $extentions = ['png', 'jpg', 'jpeg'];

                if (in_array($file_ext, $extentions) === true) { // check extenions allowed or not
                    $time = time(); // current time
                    if ($file_size < 2097152) { // move image to folder
                        $status = 'Active now'; // when user signup show Active now status
                        $file_new_name = $username . '-' . $time . '-' . $file_name; // make unique name of image
                        if ($status == 'Active now') {

                            if (move_uploaded_file($file_tmp, "images/".$file_new_name)) { // move image to images folder
                                $random_id = rand(time(), 10000000); // make random id
                                $sql3 = mysqli_query($conn, "INSERT INTO users(unique_id, username, user_fullname, user_email, user_password, user_profilepic, last_login, status) VALUES ('{$random_id}','{$username}','{$fullname}','{$email}','{$password}','{$file_new_name}','{$time},'{$status}')");

                                // Inser user's all data into DataBase
                                if ($sql3) {
                                    $sql4 = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '{$email}'");
                                    // make session
                                    if (mysqli_num_rows($sql4)) {
                                        $row = mysqli_fetch_assoc($sql4);
                                        $_SESSION['unique_id'] = $row['unique_id'];
                                        echo 'Success';
                                    }
                                }
                            }
                        } else {
                            echo 'Image upload Erorr.';
                        }
                    } else {
                        echo 'File size must have to under 2MB';
                    }
                } else {
                    echo 'Please upload jpg, png or jpeg image';
                }
            } else {
                echo 'Please upload an image.';
            }
        }
    }
} else {
    echo "Please fill al filed.";
}
