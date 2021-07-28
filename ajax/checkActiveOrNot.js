setInterval(() => { // check user active or not
    $.ajax({
        url: "actions/checkActiveOrNot.php",
        success: function (data) {
            $('#my_profile').html(data);
        }
    });
}, 5);
