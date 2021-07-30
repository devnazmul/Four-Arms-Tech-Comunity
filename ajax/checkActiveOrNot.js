setInterval(() => { // Send user heratbit to the erver 
    $.ajax({
        url: "actions/checkActiveOrNot.php",
        type: "GET",
        success: (data) => {}
    });
}, 500);