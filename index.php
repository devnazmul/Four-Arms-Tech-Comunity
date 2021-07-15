<?php
include "./app_parts/head.php";

session_start();
if (isset($_SESSION['unique_id'])) {
  header('Location: conversation.php');
}
?>

<main class="
    wrap
    w-full
    bg-gray-800
    flex
    items-center
    justify-center
    overflow-hidden
  ">
  <div class="relative hidden lg:block right-60 bottom-40 opacity-25">
    <img class="animate-pulse" src="./assets/img/site-logo.png" alt="" />
  </div>
  <div class="flex justify-center lg:block lg:w-full xl:px-20 lg:px-5 lg:mr-5">
    <div class="w-full flex items-center flex-col lg:block">
      <h1 class="
        h1
          text-2xl
          sm:text-4xl
          md:text-4xl
          lg:text-4xl
          text-gray-700
          font-black
          w-5/6
          pt-2
          lg:text-left
          text-center
        ">
        Welcome to <br />
        <span class="text-gray-100 text-4xl lg:text-5xl">Four Arms Tech <br />
          <span class="text-xl sm:text-3xl">Community</span></span>
      </h1>
      <form id="signup_from" class="my-5 w-full flex justify-center items-center flex-col lg:block" action="#" enctype="multipart/form-data">

        <div class="flex w-full justify-center flex-col items-center">
          <label class="
              appearance-none
              w-20
              h-20
              text-gray-100
              rounded-full
              border-none
              outline-none
              bg-gray-900
              focus:bg-gray-900
              py-3
              px-4
              mb-1
              flex
              justify-center
              items-center
            " for="profile_pic">
            <i class="text-2xl text-gray-600 fas fa-camera"></i>
          </label>
          <input name="profile_pic" id="profile_pic" type="file" style="display: none" />
          <h2 class="text-gray-400 mb-3">Upload profile picture</h2>
        </div>
        <div id="error" class="w-full hidden justify-center flex-col items-center bg-red-100 border border-red-400 text-red-700 px-4 py-1 mb-3 rounded relative">

        </div>
        <div class=" w-full flex justify-between">
          <input name="fullname" class="
              appearance-none
              text-gray-100
              w-full
              rounded
              border-none
              outline-none
              bg-gray-900
              focus:bg-gray-900
              py-3
              px-4
              mb-3
            " placeholder="Fullname" type="text" required />
          <input name="username" class="
              appearance-none
              text-gray-100
              w-full
              rounded
              border-none
              outline-none
              bg-gray-900
              focus:bg-gray-900
              py-3
              px-4
              ml-1
              mb-3
            " placeholder="Username" type="text" required />
        </div>
        <input name="email" class="
            appearance-none
            w-full
            text-gray-100
            rounded
            border-none
            outline-none
            bg-gray-900
            focus:bg-gray-900
            py-3
            px-4
            mb-3
          " placeholder="Email" type="email" required />
        <input name="password" class="
            appearance-none
            w-full
            text-gray-100
            rounded
            border-none
            outline-none
            bg-gray-900
            focus:bg-gray-900
            py-3
            px-4
            mb-3
          " placeholder="Password" type="password" required />
        <input name="signup_btn" id="signup_btn" class="
            appearance-none
            w-full
            text-gray-100
            rounded
            border-none
            outline-none
            bg-blue-500
            hover:bg-blue-900 hover:text-white
            py-3
            px-4
            mb-1
          " type="submit" />
      </form>
      <p class="text-gray-500">
        Already have an account?
        <a class="text-blue-500" href="login.php"><b> Sign In</b></a>
      </p>
    </div>
  </div>
</main>






<script src="ajux/signup.js" type="text/javascript"></script>

<?php
include "./app_parts/footer.php";
?>