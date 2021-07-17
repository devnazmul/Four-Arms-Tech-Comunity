<?php
include './db/config.php';
session_start();

$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}
?>

<aside class="pr-1 overflow-hidden sidebar w-full h-50 sm:w-2/3 md:w-2/4 md:h-full lg:w-1/3 xl:w-1/3 2xl:w-1/6 bg-gray-900 shadow- rounded-br-xl">
    <div class="w-full h-20 px-9 sm:px-2 md:px-6 flex justify-between items-center">
        <div class="flex items-center">

            <div>
                <div class="overflow-hidden w-14 h-14">
                    <img class="object-contain rounded-full w-full h-full  mr-3 border-4 border-gray-700" src="./actions/images/<?php echo $row['user_profilepic']; ?>" alt="">
                    <div class="bg-green-500 border-2 border-gray-700 h-4 w-4 rounded-full float-right relative bottom-4 right-1"></div>
                </div>
            </div>
            <div class="ml-3">
                <h2 class="text-white font-bold"><?php echo $row['user_fullname']; ?></h2>
                <span class="text-white lg\:font-light text-gray-600 text-xs"><?php echo $row['status']; ?></span>
            </div>


        </div>

        <a class="no-underline text-white" title="Logout" href="logout.php ">
            <div class="transform rotate-90">
                <lord-icon src="https://cdn.lordicon.com/koyivthb.json" trigger="hover" colors="primary:#ffffff,secondary:#3080e8" stroke="100" scale="51" style="width:40px;height:40px">
                </lord-icon>
            </div>

        </a>
    </div>
    <hr class="border-gray-700 w-5/6 mx-auto">
    <!-- SEARCH FORM  -->
    <form action="" method="get" class="w-full h-12 mx-5 my-5 flex">
        <input id="searchInput" class="block w-full text-gray-100 rounded border-none outline-none bg-gray-800 py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Search people">
        <button id="searchBtn" class="relative right-10 hover:bg-gray-700 rounded-r bottom-0 w-12 h-9 "><i class="text-gray-500 fas fa-search"></i></button>
    </form>


    <!-- FRIENDS STATUS CATEGORY LINKS  -->
    <div class="w-full h-12 my-3 flex justify-around text-white text-2xl">
        <a title="Messages" class="hover:text-blue-600 bg-gray-800 px-5 py-2 rounded-full" href="">
            <i class="fas fa-comments"></i>
        </a>
        <a title="Friends" class="hover:text-blue-600 bg-gray-800 px-5 py-2 rounded-full" href="">
            <i class="fas fa-user-check"></i>
        </a>
        <a title="Groups" class="hover:text-blue-600 bg-gray-800 px-5 py-2 rounded-full" href="">
            <i class="fas fa-users"></i>
        </a>
    </div>


    <!-- FRIENDS LIST  -->

    <div id="userList" class="overflow-y-scroll friend_list">

    </div>
</aside>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>