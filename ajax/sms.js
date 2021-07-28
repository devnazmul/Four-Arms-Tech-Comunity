//send sms list ajax
const smsArea = document.querySelector('#smsArea'),
    mobile_smsArea = document.querySelector('#mobile_smsArea'),
    form2 = document.querySelector('.sms_form'),
    sms_input = document.querySelector('.sms_input'),
    file_input = document.querySelector('.file_input'),
    send_btn = document.querySelector('.send-btn'),
    mobile_sms_input = document.querySelector('.mobile_sms_input'),
    mobile_file_input = document.querySelector('.mobile_file_input'),
    mobile_send_btn = document.querySelector('.mobile_send-btn');

form2.onsubmit = (e) => {
    e.preventDefault();
}



if (window.innerWidth < 640) {
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
    }, 500);
    
} else {
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
                    form2.reset();
                }
            }
        }
        let formData = new FormData(form2);
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
        let formData = new FormData(form2);
        xhr.send(formData);
    }, 500);

}

function scrollToBottom () {
    smsArea.scrollTop = smsArea.scrollHeight;
}
function scrollToBottom_mobile () {
    mobile_smsArea.scrollTop = mobile_smsArea.scrollHeight;
}
