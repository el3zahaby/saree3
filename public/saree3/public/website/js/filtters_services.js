

/* Search  of Services */
$(".sidebar .search-form").submit(function (e) {
    e.preventDefault();
    let search = $("#mt_search").val();

    $.ajax({
        url : 'search_services',
        methode :'POST',
        data :  {search},
        success:function (data) {
            console.log(data);
            $('#show_fliter').html(data);
        }
    });
});
