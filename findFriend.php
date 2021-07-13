<?php
include "./theme_part/head.php";
?>

<main class="wrap w-full bg-gray-900 flex justify-start flex-col items-center overflow-hidden">
    <h1 class="text-3xl font-bold mt-10 mr-5 text-gray-300">Find friends</h1>
    <form action="" method="get" class="w-full h-12 my-5 flex justify-center align-center">
        <input class="block w-1/2 text-gray-100 rounded border-none outline-none bg-gray-800 py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Search people">
        <button class="relative right-10 hover:bg-gray-700 rounded-r bottom-0 w-12 h-9 "><i class="text-gray-500 fas fa-search"></i></button>
    </form>
    <div class="w-full px-5 lg:w-1/4 md:mr-7 my-5 bg-gray-700 p-5 h-auto rounded overflow-y">
        <div class="flex mb-2 items-center justify-between bg-gray-800 hover:bg-gray-900 px-5 rounded">
            <div>
                <div class="mt-2">
                    <img class="rounded-full mr-3 h-14 w-auto border-4 border-gray-700" src="./assets/img/profile_me.jpg" alt="">
                    <div class="bg-green-500 border-2 border-gray-700 h-4 w-4 rounded-full float-right relative bottom-4 right-3"></div>
                </div>
            </div>
            <div>
                <h2 class="text-gray-500 font-bold">Md Nazmul Islam</h2>
                <span class="text-white lg\:font-light text-gray-700 text-xs">Hello how Are You........</span>
            </div>
            <a href="#">
                <i class="hover:text-gray-400 text-gray-200 text-2xl fa fa-user-plus"></i>
            </a>
        </div>
    </div>
</main>

<?php
include "./theme_part/footer.php";
?>