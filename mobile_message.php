<?php
include './db/config.php';
session_start();
if (!isset($_SESSION['unique_id'])) {
    header('Location: login.php');
}
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}

include "./app_parts/head.php";
?>

<?php

$my_unique_id = $row['unique_id']; // this computer user unique_id

if (isset($_GET['id'])) {

   $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_GET['id']}");
   if (mysqli_num_rows($sql2) > 0) {
       $row2 = mysqli_fetch_assoc($sql2); // other computer user data
       $other_unique_id = $row2['unique_id'];
       
   }
?>

<style>
/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
}

/* Modal Content */

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<div class="overflow-hidden message w-full block bg-gray-800">
    <!-- Heade Area  -->
    <div class="flex bg-gray-900 h-20 flex justify-between items-center">
        <div>
            <div class="w-full h-20 px-2 flex items-center">
                <button id="myBtn">
                    <div class="overflow-hidden w-14 h-14 mx-2">
                        <img class="object-cover rounded-full w-full h-full  mr-3"
                            src="./actions/images/<?php echo $row2['user_profilepic']; ?>" alt="">
                        <?php if ($row2['status'] == "Offline") { ?>
                        <div
                            class="bg-red-500 border-2 border-gray-900 h-4 w-4 rounded-full float-right relative bottom-4 right-1">
                        </div>
                        <?php } else { ?>
                        <div
                            class="bg-green-500 border-2 border-gray-900 h-4 w-4 rounded-full float-right relative bottom-4 right-1">
                        </div>
                        <?php } ?>
                    </div>
                </button>
                <div>
                    <h2 class="text-white font-bold"><?php echo $row2['user_fullname']; ?></h2>
                    <span class="text-white lg\:font-light text-gray-600 text-xs"><?php echo $row2['status']; ?></span>
                </div>
            </div>
        </div>


        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content flex justify-center items-center">
                <div class="bg-gradient-to-r from-green-400 to-blue-500 w-1/2 rounded-xl px-5">
                    <span class="close">&times;</span>
                    <div class="w-full  rounded-lg flex-col flex justify-center items-center pb-10">
                        <img class="object-cover rounded-full w-36 h-36 mr-3 border-4 border-gray-700"
                            src="./actions/images/<?php echo $row2['user_profilepic']; ?>" alt="">
                        <h1 class="text-white text-5xl"><?php echo $row2['user_fullname']; ?></h1>
                        <p class="text-gray-700 text-xl"><?php echo $row2['user_email']; ?></p>
                    </div>

                </div>

            </div>
        </div>






        <div class="text-white text-lg mr-10">
            <a href="conversation.php">
                <img src="./assets/icons/back-arrow.svg" alt="">
            </a>
        </div>
    </div>
    <!-- SMS Area  -->
    <div id="mobile_smsArea" class="overflow-y-scroll h-full py-1 pr-3 pl-5 conversation transition">


    </div>
    <!-- Form Area  -->
    <form autocomplete="off" action="#" class="mobile_sms_form w-full rounded px-0 pt-1 flex items-center">
        <input name="my_id" value="<?php echo $my_unique_id; ?>" placeholder="Type your message"
            class="shadow-md outline-none w-full pr-10 bg-black rounded-full text-gray-600 ml-5 px-3 py-2" type="number"
            hidden>
        <input name="others_id" value="<?php echo $other_unique_id; ?>" placeholder="Type your message"
            class="shadow-md outline-none w-full pr-10 bg-black rounded-full text-gray-600 ml-5 px-3 py-2" type="number"
            hidden>
        <input name="sms" placeholder="Type your message"
            class="mobile_sms_input shadow-md outline-none w-full pr-10 bg-black rounded-full text-gray-600 ml-5 px-3 py-2"
            type="textarea">
        <label class="hover:bg-gray-500 relative right-9 px-2 py-1 rounded-full" for="file_input">
            <i class="text-white fas fa-paperclip"></i>
        </label>
        <input name="sms_file" type="file" id="file_input" class="mobile_file_input" style="display: none;">
        <button style="outline: none;"
            class="mobile_send-btn relative right-4 hover:bg-gray-300 bg-green-500 shadow hover:bg-green-800 bg-green-500 px-2  py-1 rounded-full"
            id="submit_input"><i class="text-white fas fa-paper-plane"></i></button>
    </form>
</div>
<?php
} else { ?>
<div class="overflow-hidden message w-full hidden sm:block">
    <div class="overflow-y-scroll sm:px-5 px-10 text-center w-full h-full flex justifu-center items-center">
        <div class="w-full">
            <h1 class="text-center w-full text-gray-600 font-bold lg:text-5xl md:text-4xl text-3xl">Please select an
                user to chatting.</h1>
        </div>
    </div>
</div>
<?php
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="./ajax/list.js" type="text/javascript"></script>
<script src="./ajax/mobile_sms.js" type="text/javascript"></script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<?php 
include "./app_parts/footer.php";
?>