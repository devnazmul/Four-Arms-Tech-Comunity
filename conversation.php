<?php
include './db/config.php';
session_start();
if (!isset($_SESSION['unique_id'])) {
    header('Location: login.php');
}

include "./app_parts/head.php";
?>

<main class="wrap w-full bg-gray-800 flex">
    <?php
    include "./app_parts/aside.php";
    include "./app_parts/message.php";
    ?>
</main>
<script src="./ajux/chatList.js" type="text/javascript"></script>
<?php
include "./app_parts/footer.php";
?>