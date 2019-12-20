function search_page(param, value) {
    var searchParams = new URLSearchParams(window.location.search);
    searchParams.set(param, value)
    var newParams = searchParams.toString()
    window.location.href = window.location.href.split('?')[0] + '?' + newParams;
}

function search_input(param, value) {
    if (event.keyCode === 13) {
        search_page(param, value)
    }
}