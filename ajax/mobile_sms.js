const form2 = document.querySelector(".mobile_sms_form"),
    mobile_smsArea = document.querySelector("#mobile_smsArea"),
    mobile_sms_input = document.querySelector(".mobile_sms_input"),
    mobile_file_input = document.querySelector(".mobile_file_input"),
    mobile_send_btn = document.querySelector(".mobile_send-btn");

form2.onsubmit = (e) => {
    e.preventDefault();
};

mobile_smsArea.onmouseenter = () => {
    mobile_smsArea.classList.add('active');
}
mobile_smsArea.onmouseleave = () => {
    mobile_smsArea.classList.remove('active');
}

mobile_send_btn.onclick = () => { // sms send and store to database
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/sms.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                mobile_smsArea.innerHTML = data;
                mobile_sms_input.value = "";
                form2.reset();
            }
        }
    }
    let formData = new FormData(form2);
    xhr.send(formData);
}
setInterval(() => { // sms Show From Database
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/mobile_view_sms.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                mobile_smsArea.innerHTML = data;
                if (!mobile_smsArea.classList.contains('active')) {
                    scrollToBottom_mobile();
                }
            }
        }
    }
    let formData = new FormData(form2);
    xhr.send(formData);
}, 1000);

function scrollToBottom_mobile() {
    mobile_smsArea.scrollTop = mobile_smsArea.scrollHeight;
}