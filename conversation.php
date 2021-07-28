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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="./ajax/list.js" type="text/javascript"></script>
<script src="./ajax/sms.js" type="text/javascript"></script>
<?php
include "./app_parts/footer.php";
?>