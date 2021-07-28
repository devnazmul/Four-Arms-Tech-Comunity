setInterval(() => { // check user active or not
    $.ajax({
        url: "actions/checkActiveOrNot.php",
        success: function (data) {
            
        }
    });
}, 500);
