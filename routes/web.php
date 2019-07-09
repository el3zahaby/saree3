<?php

    //////////////////////////////////////////////////////////////////// 
    //                                                                 //   
    //                 @ WEB SITE ROUTES FILE @                        //
    //                   Version 1.0 By Ayoub                          //
    //                                                                 //
    ////////////////////////////////////////////////////////////////////


Auth::routes();


//Logout Of User
Route::get('/logout','manageUsers@Logout');

// Login Staff
Route::prefix('admin')->as('backend.')->group( function () {
    Route::get('login', 'Backend\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Backend\Auth\LoginController@login')->name('login.submit');
    Route::get('logout', 'Backend\Auth\LoginController@logout')->name('logout')->middleware('auth:staff');

    Route::get('register', 'Backend\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Backend\Auth\RegisterController@register')->name('register.submit');

    Route::get('password/reset', 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Backend\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Backend\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Backend\Auth\ResetPasswordController@reset')->name('password.update');
});

/*
 *** Routes Pages Website
 */
Route::get('/','welcomeController@welcome');
Route::get('/home','HomeController@showHomePage');
Route::get('/HowToShop','HomeController@HowToShop');


Route::get('/products','HomeController@products_page_show');
Route::get('/products_list','HomeController@products_page_list_show');
Route::get('/products/{slug}', 'HomeController@ProductItem');


Route::get('/services','HomeController@ShowServicesPage');
Route::get('/services/{slug}','HomeController@ShowServicesItem');

//Route::get('/services/{slug}', function ($slug) {
//    return View('website.services.serviceItem',settings());
//});

Route::get('/services_listview','HomeController@ShowServicesPage_listview');



Route::get('/Shop','HomeController@ShowShopPage');
Route::get('/Shop/{id}', function ($id) {
    return View('website.shop.shopItem')->with(settings());
});

Route::get('/forum','HomeController@ShowForumPage');
Route::get('/forum/{slug}','HomeController@Openfum_show');
Route::get('/favourites','HomeController@ShowFavouritesPage');

Route::get('authorProfile','manageUsers@loginprofile');
Route::get('profile/{slug}','manageUsers@userprofile');


/*
 * * Routes Of Register User Seller Or Buyer
 */
Route::prefix('join')->group( function () {
    Route::get('/','manageUsers@join_show')->name('user.reg');
    Route::post('seller','manageUsers@seller_register');
    Route::post('buyer','manageUsers@buyer_register');
    Route::get('seller/verify','manageUsers@seller_register_verify_show');
    Route::post('seller/verify','manageUsers@seller_register_verify');

});



/*
 * * Routes Of Seller Dashboard
 */
Route::prefix('seller')->group( function () {
    Route::group(['middleware' => 'auth'], function () {
        
        Route::get('/','manageUsers@seller_settings');
        Route::get('settings','manageUsers@seller_settings');
        Route::get('purchases','SellerDashboard\DashSellerController@purchases');
        Route::get('statement','SellerDashboard\DashSellerController@statement');
        Route::get('notifications','SellerDashboard\DashSellerController@notifications');
        Route::prefix('messages')->group( function () {
            Route::get('inbox','SellerDashboard\DashSellerController@inbox');
        });
        Route::get('buycredits','SellerDashboard\DashSellerController@buycredits');
        Route::get('statistics','SellerDashboard\DashSellerController@statistics');
        Route::get('addservice','SellerDashboard\DashSellerController@addservice');
        Route::post('addservice','manageUsers@seller_add_service');
        Route::get('withdrawals','SellerDashboard\DashSellerController@withdrawals');
        Route::get('manageitems','SellerDashboard\DashSellerController@manageitems');

        Route::post('settings/normal',"manageUsers@seller_settings_normal");
        Route::post('settings/passwords',"manageUsers@seller_settings_password");
        Route::post('check/username',"manageUsers@seller_check_username");
        Route::post('check/passwords/new',"manageUsers@seller_check_current_password");

        //selector of categories :
        Route::get('getsubcat', function () {
            $id    = Request()->id;
            $title = Request()->title;

            $sub_cats = check_sub_section($id);
            echo "<option value=\"0\" disabled selected>".$title."</option>";
            foreach ($sub_cats as $key => $value) {
                echo "<option value =" .$value->section_id. ">". json_decode($value->section_title)->ar ."</option>";
            }
        });

        Route::get('addproducts','SellerDashboard\DashSellerController@addproducts_show');
        Route::post('addproducts','SellerDashboard\DashSellerController@addproducts');

    });   
});



Route::get('getcity','HomeController@getcity');

Route::get('x','HomeController@x');



/**
 *  FILTER ROUTES 
 * 
 * 
 *  */ 

Route::get('sort_filter','filterController@filter_price');
Route::get('sort_filter_list','filterController@filter_price_list_page');

Route::get('price_filter','filterController@price_filter');
Route::get('price_filter_list','filterController@price_filter_list');

Route::get('filter_city','filterController@filter_city');
Route::get('filter_city_list','filterController@filter_city_list');



Route::get('search_products','filterController@search_products');
Route::get('search_products_list','filterController@search_products_list');

Route::get('search_services','filterController@search_services');

/**
 *  SHOPING Card ROUTES 
 * 
 * */ 

Route::get('/products/card/add', 'CardController@add_to_card')->name('addToCard');
Route::get('/cards','CardController@index');


// add product to fav
Route::get('/products/fav/add' , function () {
   Productfav::create(['product_id' => Request()->product_id , 'user_id' => Request()->user_id]);
   //return session()->flash("addfav_don",'ayoub');
});

foreach (get_pages() as $item => $val) {
    Route::get("page/{slug}","pagerController@index");
}





Route::get('/chat/s/start/{with}/{idofserv}','ChatController@chat_start')->name('chat.start');
Route::post('/rooms/upload','ChatController@room_upload')->name('chat.upload');

Route::get('/chat/rooms/{id}','ChatController@chat_view')->where('id','[1-9]+')->name('chat.view');
Route::post('/messages/add','ChatController@insert_messages')->name('chat.send');;
Route::get('/rooms/block/{room_id}','ChatController@rooms_block');
Route::post('/rooms/voices/upload','ChatController@room_voice_upload');