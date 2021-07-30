<?php 
include "./app_parts/head.php";
session_start();
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $random_id = mysqli_real_escape_string($conn, $_GET['random_id']);

    $sql = mysqli_query($conn,"UPDATE users SET account_type = 'activated' WHERE user_email = '{$email}' AND unique_id = {$random_id}");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['unique_id'] = $row['unique_id'];
        header('Location: login.php');
    }

} else {
    header('Location: index.php');
}