//caht list ajax
const userList = document.querySelector('#userList'),
    searchInput = document.querySelector('#searchInput'),
    searchBtn = document.querySelector('#searchBtn');


searchInput.onkeyup = () => {
    var searchTerm = searchInput.value;

    if (searchTerm != "") {
        searchInput.classList.add('searchActive');
    } else {
        searchInput.classList.remove('searchActive');
    }
    $.ajax({
        url: "actions/search.php",
        type: "POST",
        data: { search_term: searchTerm },
        success: function (data) {
            userList.innerHTML = data;
           
        }
    });
}


setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "actions/chatList.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (!searchInput.classList.contains('searchActive')) {
                    userList.innerHTML = data;
                }
                
            }
        }
    }
    xhr.send();
}, 500);

