<?php
include "./theme_part/head.php";
session_start();
if (isset($_SESSION['unique_id'])) {
    header('Location: conversation.php');
}
?>

<main class="wrap w-full bg-gray-800 flex items-center justify-center overflow-hidden">
    <div class="flex justify-center items-center w-full flex-col">
        <div class=" w-2/3 sm:w-2/6  flex items-center flex-col">
            <h1 class="text-6xl mb-5 text-center text-gray-200 font-bold">Log In
            </h1>
            <form id="login_form" class="my-5 w-full flex justify-center items-center flex-col lg:block" action="">
                <div id="error" class="w-full hidden justify-center flex-col items-center bg-red-100 border border-red-400 text-red-700 px-4 py-1 mb-3 rounded relative">

                </div>
                <input name="user_or_email" class="appearance-none w-full text-gray-100 rounded border-none outline-none bg-gray-900 focus:bg-gray-900 py-3 px-4 mb-3" placeholder="Email or username" type="text">
                <input name="password" class="appearance-none w-full text-gray-100 rounded border-none outline-none bg-gray-900 focus:bg-gray-900 py-3 px-4 mb-3" placeholder="Password" type="password">
                <input id="login_btn" class="appearance-none w-full text-gray-100 rounded border-none outline-none bg-blue-500 hover:bg-blue-900 hover:text-white py-3 px-4 mb-1" type="submit">
            </form>
            <p class="text-gray-500">Not have an account? <a class="text-blue-500" href="index.php"><b> Sign Up</b></a></p>
        </div>
    </div>
</main>



<script src="ajux/login.js" type="text/javascript"></script>
<?php
include "./theme_part/footer.php";
?>