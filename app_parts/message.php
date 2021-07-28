<?php
$my_unique_id = $row['unique_id']; // this computer user unique_id
if (isset($_GET['id'])) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_GET['id']}");
    if (mysqli_num_rows($sql) > 0) {
        $row2 = mysqli_fetch_assoc($sql); // other computer user data
        $other_unique_id = $row2['unique_id'];
    }
?>
<div class="overflow-hidden message w-full hidden sm:block">
    <!-- Heade Area  -->
    <div class="flex bg-gray-900 h-20 flex justify-between items-center">
        <div>
            <div class="w-full h-20 px-9 flex items-center">
                <div>
                    <div class="overflow-hidden w-14 h-14 mx-2">
                        <img class="object-cover rounded-full w-full h-full  mr-3 border-4 border-gray-700"
                            src="./actions/images/<?php echo $row2['user_profilepic']; ?>" alt="">
                        <div
                            class="bg-green-500 border-2 border-gray-700 h-4 w-4 rounded-full float-right relative bottom-4 right-1">
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="text-white font-bold"><?php echo $row2['user_fullname']; ?></h2>
                    <span class="text-white lg\:font-light text-gray-600 text-xs"><?php echo $row2['status']; ?></span>
                </div>

            </div>
        </div>
        <div class="text-white text-lg mr-10">
            <i class="fas fa-info-circle"></i>
        </div>
    </div>

    <!-- SMS Area  -->
    <div id="smsArea" class="transition overflow-y-scroll sm:px-5 px-10 conversation">
    </div>

    <!-- Form Area  -->
    <form autocomplete="off" action="#" class="sms_form w-full mt-2 mb-4 rounded sm:px-1 px-8 pt-1 flex items-center">
        <input name="my_id" value="<?php echo $my_unique_id; ?>" placeholder="Type your message"
            class="shadow-md outline-none w-full pr-10 bg-black rounded-full text-gray-600 ml-5 px-3 py-2" type="number"
            hidden>
        <input name="others_id" value="<?php echo $other_unique_id; ?>" placeholder="Type your message"
            class="shadow-md outline-none w-full pr-10 bg-black rounded-full text-gray-600 ml-5 px-3 py-2" type="number"
            hidden>
        <input name="sms" id="sms_input" placeholder="Type your message"
            class="sms_input shadow-md outline-none w-full pr-10 bg-black rounded-full text-gray-600 ml-5 px-3 py-2"
            type="textarea">
        <label class="hover:bg-gray-500 relative right-9 px-2 py-1 rounded-full" for="file_input">
            <i class="text-white fas fa-paperclip"></i>
        </label>
        <input name="sms_file" class="file_input" id="file_input" type="file" style="display: none;">
        <button
            class="send-btn relative right-3 hover:bg-gray-300 bg-green-500 shadow hover:bg-green-800 bg-green-500 px-2  py-1 rounded-full"
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