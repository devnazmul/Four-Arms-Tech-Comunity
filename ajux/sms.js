//send sms list ajax
const smsArea = document.querySelector('#smsArea'),
    form2 = document.querySelector('.sms_form'),
    sms_input = document.querySelector('#sms_input'),
    file_input = document.querySelector('#file_input'),
    send_btn = document.querySelector('.send-btn');
form2.onsubmit = (e) => {
    e.preventDefault();
}

send_btn.onclick = () => { // sms send and store to database
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/sms.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                sms_input.value = '';
                form2.reset();
            }
        }
    }
    let formData = new FormData(form2);
    xhr.send(formData);
}
window.scrollTo(0,document.querySelector("#smsArea").scrollHeight);
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
