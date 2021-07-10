<?php
include "./theme_part/head.php";
?>

<main class="wrap w-full bg-gray-800 flex items-center justify-center overflow-hidden">
    <div class="flex justify-center items-center w-full flex-col">
        <div class=" w-2/3 sm:w-2/6  flex items-center flex-col">
            <h1 class="text-6xl mb-5 text-center text-gray-200 font-bold">Log In
            </h1>
            <form class="my-5 w-full flex justify-center items-center flex-col lg:block" action="">
                <input class="appearance-none w-full text-gray-100 rounded border-none outline-none bg-gray-900 focus:bg-gray-900 py-3 px-4 mb-3" placeholder="Email" type="email">
                <input class="appearance-none w-full text-gray-100 rounded border-none outline-none bg-gray-900 focus:bg-gray-900 py-3 px-4 mb-3" placeholder="Password" type="password">
                <input class="appearance-none w-full text-gray-100 rounded border-none outline-none bg-blue-500 hover:bg-blue-900 hover:text-white py-3 px-4 mb-1" type="submit">
            </form>
            <p class="text-gray-500">Not have an account? <a class="text-blue-500" href="welcome.php"><b> Sign Up</b></a></p>
        </div>
    </div>
</main>

<?php
include "./theme_part/footer.php";
?>