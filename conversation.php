<?php
include './db/config.php';
session_start();
if (!isset($_SESSION['unique_id'])) {
    header('Location: login.php');
}



include "./theme_part/head.php";
?>

<main class="wrap w-full bg-gray-800 flex">
    <?php
    include "./theme_part/aside.php";
    include "./theme_part/message.php";
    ?>
</main>


<?php
include "./theme_part/footer.php";
?>