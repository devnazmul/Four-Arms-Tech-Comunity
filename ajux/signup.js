  // sign up ajax
const form = document.querySelector("#signup_from"),
    submitBtn = form.querySelector("#signup_btn"),
    err = document.querySelector("#error");

form.onsubmit = (e) => {
    e.preventDefault();
}

submitBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/signup.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == 'Success') {
                    location.href = 'conversation.php';
                } else {
                    err.textContent = data;
                    err.style.display = 'flex';
                }
            }
        }
    }
    
    let formData = new FormData(form);
    xhr.send(formData);
};
