//send sms list ajax
const form2 = document.querySelector('.sms_form'),
    sms_input = document.querySelector('#sms_input'),
    file_input = document.querySelector('#file_input'),
    send_btn = document.querySelector('.send-btn');

form2.onsubmit = (e) => {
    e.preventDefault();
}

send_btn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/sms.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                sms_input.value = '';
                form2.reset();
                console.log(data);
            }
        }
    }
    
    let formData = new FormData(form2);
    xhr.send(formData);
}