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
    
    if (window.innerWidth < 640) {
        $.ajax({
            url: "actions/mobile_search.php",
            type: "POST",
            data: {
                search_term: searchTerm
            },
            success: function (data) {
                userList.innerHTML = data;
            }
        });
    } else {
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
    
}

if (window.innerWidth < 640) {
    setInterval(() => {
        $.ajax({
            url: "actions/mobile_list.php",
            type: "GET",
            success: function (data) {
                if (!searchInput.classList.contains('searchActive')) {
                    userList.innerHTML = data;
                }
            }
        });
    }, 500);
} else {
    setInterval(() => {
        $.ajax({
            url: "actions/list.php",
            type: "GET",
            success: function (data) {
                if (!searchInput.classList.contains('searchActive')) {
                    userList.innerHTML = data;
                }
            }
        });
    }, 500);
}
