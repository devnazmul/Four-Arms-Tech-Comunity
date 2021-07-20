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
        data: {
            search_term: searchTerm
        },
        success: function (data) {
            userList.innerHTML = data;
        }
    });
}


setInterval(() => {
    $.ajax({
        url: "actions/chatList.php",
        type: "POST",
        
        success: function (data) {
            if (!searchInput.classList.contains('searchActive')) {
                userList.innerHTML = data;
            }
        }
    });
}, 1000);

