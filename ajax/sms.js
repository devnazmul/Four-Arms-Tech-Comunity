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
    mobile_send_btn.onclick = () => { // sms send and store to database
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "actions/sms.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
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
                }
            }
        }
        let formData = new FormData(form2);
        xhr.send(formData);
    }, 500);
    
} else {
    send_btn.onclick = () => { // sms send and store to database
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "actions/sms.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
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
                }
            }
        }
        let formData = new FormData(form2);
        xhr.send(formData);
    }, 500);

}
