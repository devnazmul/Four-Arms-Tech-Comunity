<?php
session_start();
// import db config file
include_once '../db/config.php';

if (isset($_SESSION['unique_id'])) {
    $my_id = mysqli_real_escape_string($conn, $_POST['my_id']);
    $others_id = mysqli_real_escape_string($conn, $_POST['others_id']);
    $sms = mysqli_real_escape_string($conn, $_POST['sms']);
    $sms_file = $_FILES['sms_file'];
    
    if (!empty($sms) && !empty($sms_file)) { // check sms and file sended or not
        if (isset($_FILES['sms_file'])) {
            $file_name = $_FILES['sms_file']['name'];
            $file_type = $_FILES['sms_file']['type'];
            $file_size = $_FILES['sms_file']['size'];
            $file_tmp = $_FILES['sms_file']['tmp_name'];
            $time = time(); // current time
            $status = 'Send'; // when user signup show Active now status
            $file_new_name = $my_id.'-'.$time.'-'.$file_name; // make unique name of image
            if ($status == 'Send') {
                if (move_uploaded_file($file_tmp,'sms_files/'.$file_new_name)) { // move image to images folder
                    $sql = mysqli_query($conn, "INSERT INTO messages(incomming_sms_id, outgoing_sms_id, sms, sms_file) VALUES ({$my_id},{$others_id},'{$sms}','{$file_new_name}')");
                    die();
                }
            } else {
                echo 'File upload Erorr.';
            }
        }
    }

    if (!empty($sms_file) && empty($sms)) { // check only file sended or not
        if (isset($_FILES['sms_file'])) {
            $file_name = $_FILES['sms_file']['name'];
            $file_type = $_FILES['sms_file']['type'];
            $file_size = $_FILES['sms_file']['size'];
            $file_tmp = $_FILES['sms_file']['tmp_name'];
            $time = time(); // current time
            $status = 'Send'; // when user signup show Active now status
            $file_new_name = $my_id.'-'.$time.'-'.$file_name; // make unique name of image
            if ($status == 'Send') {
                if (move_uploaded_file($file_tmp,'sms_files/'.$file_new_name)) { // move image to images folder
                    $sql = mysqli_query($conn, "INSERT INTO messages(incomming_sms_id, outgoing_sms_id, sms_file) VALUES ({$my_id},{$others_id},'{$file_new_name}')");
                    die();
                }
            } else {
                echo 'File upload Erorr.';
            }
        }
    } else { // check only sms sended or not
        $sql = mysqli_query($conn, "INSERT INTO messages(incomming_sms_id, outgoing_sms_id, sms) VALUES ({$my_id},{$others_id},'{$sms}')");
        die();
    }

} else {
    header('Location: ../login.php');
}

?>