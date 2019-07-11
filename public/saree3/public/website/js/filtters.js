/**
*This File For Fillers of Products
**** 
**/

$("#country_filter").change(function () {
    var selected = $(this).val();
    $.ajax({
        url : 'getcity',
        methode :'POST',
        data :  {id : selected , title : "إختر المدينة..."},
        success:function (data) {
            $("#city_filter").html(data);
        }
    });
});

$("#city_filter").change(function () {
    var city = $(this).val();

    //alert(city);
    $.ajax({
        url : 'filter_city',
        methode :'POST',
        data :  {city},
        success:function (data) {
            $('#show_filter_price').html(data);
        }
    });
});


/*
* price filter
*/
$('#price_filter').change(function () {
    var sort = $(this).val();

    $.ajax({
        url : 'sort_filter',
        methode :'POST',
        data :  {sort : sort},
        success:function (data) {
            console.log(data);
            $('#show_filter').html(data);
        }
    });

});

/*
    MIN - MAX Price
*/

$('#max_price').keyup(function () {
    let max_price = $(this).val();
    let min_price = $("#min_price").val();
    if(min_price == "") {
        min_price = 0;
    }

    $.ajax({
        url : 'price_filter',
        methode :'POST',
        data :  {min_price : min_price , max_price},
        success:function (data) {
            console.log(data);
            $('#show_filter_price').html(data);
        }
    });

});


/* Search  of Products */
$(".sidebar .search-form").submit(function (e) {
    e.preventDefault();
    let search = $("#mt_search").val();
    //alert(search);
    $.ajax({
        url : 'search_products',
        methode :'POST',
        data :  {search},
        success:function (data) {
            console.log(data);
            $('#show_filter_price').html(data);
        }
    });
});

