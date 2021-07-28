<?php
include './db/config.php';
if (!isset($_SESSION['unique_id'])) {
    header('Location: login.php');
}
?>
<link rel="stylesheet" href="aside.css">
<aside
    class="pr-1 overflow-hidden sidebar w-full sm:w-2/3 md:w-2/4 md:h-full lg:w-1/3 xl:w-1/3 2xl:w-1/6 bg-gray-900 shadow- rounded-br-xl">
    <div class="w-full h-20 px-9 sm:px-2 md:px-6 flex justify-between items-center">
        <div id="my_profile">

        </div>
        <a class="no-underline text-white" title="Logout" href="logout.php ">
            <div class=" transform rotate-90">
                <lord-icon src="https://cdn.lordicon.com/koyivthb.json" trigger="hover"
                    colors="primary:#ffffff,secondary:#3080e8" stroke="100" scale="51" style="width:40px;height:40px">
                </lord-icon>
            </div>
        </a>
    </div>
    <hr class="border-gray-700 w-5/6 mx-auto">

    <!-- SEARCH FORM  -->
    <form action="" method="get" class="w-full h-12 mx-5 mt-5 mb-2 flex">
        <input id="searchInput"
            class="block w-full text-gray-100 rounded border-none outline-none bg-gray-800 py-3 px-4 mb-3"
            id="grid-first-name" type="text" placeholder="Search people">
        <button id="searchBtn" class="relative right-10 hover:bg-gray-700 rounded-r bottom-0 w-12 h-9 ">
            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="hover" delay='2s'
                colors="primary:#6b7280,secondary:#08a88a" stroke="250" style="width:25px;height:25px">
            </lord-icon>
        </button>
    </form>

    <!-- FRIENDS LIST  -->
    <div class="h-30 friend_list">
        <!-- FRIENDS STATUS CATEGORY LINKS  -->
        <div
            class="w-full sticky overflow-hidden top-0 bg-gray-900 z-50 pb-2 flex items-center justify-around text-white text-2xl">
            <a title="Find Friends" class="py-3 px-10 flex items-center justify-center hover:bg-gray-800 rounded-full"
                href="">
                <img class="w-5" src="./assets/icons/add-friend.svg" alt="">
            </a>
            <a title="Find Friends" class="py-3 px-10 flex items-center justify-center hover:bg-gray-800 rounded-full"
                href="">
                <img class="w-5" src="./assets/icons/add-friend.svg" alt="">
            </a>
        </div>
        <!-- FRIENDS LIST  -->
        <div id="userList" class="overflow-y-scroll h-full">

        </div>
    </div>
</aside>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
<script></script>