//send sms list ajax
const form3 = document.querySelector('#sms_form'),
    smsArea = document.querySelector('#smsArea'),
    sms_input = document.querySelector('.sms_input'),
    file_input = document.querySelector('.file_input'),
    send_btn = document.querySelector('.send-btn');

form3.onsubmit = (e) => {
    e.preventDefault();
}

smsArea.onmouseenter = () => {
    smsArea.classList.add('active');
}
smsArea.onmouseleave = () => {
    smsArea.classList.remove('active');
}

send_btn.onclick = () => { // sms send and store to database
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/sms.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                smsArea.innerHTML = data;
                sms_input.value = "";
                form3.reset();
            }
        }
    }
    let formData = new FormData(form3);
    xhr.send(formData);
}

setInterval(() => { // sms Show From Database
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/view_sms.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                smsArea.innerHTML = data;
                if (!smsArea.classList.contains('active')) {
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form3);
    xhr.send(formData);
}, 1000);

function scrollToBottom() {
    smsArea.scrollTop = smsArea.scrollHeight;
}

