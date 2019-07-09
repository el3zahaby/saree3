<?php

Route::get('/', function () {
    return view('backend.home');
})->name('home');

Route::get('lang/{lang}', 'MainController@change_lang')->name('lang');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');



Route::get('/settings', 'SettingController@index')->name('settings');
Route::post('/settings', 'SettingController@update')->name('settings.update');

// Staff Routes --------------------
Route::resource('staff', 'StaffController');
Route::get('datatable/staff', 'StaffController@datatable')->name('staff.datatable');
Route::post('staff/updateAll', 'StaffController@updateAll')->name('staff.updateAll');

// Test Routes --------------------
//Route::resource('tests', 'TestController');
//Route::get('datatable/tests', 'TestController@datatable')->name('tests.datatable');
//Route::post('tests/updateAll', 'TestController@updateAll')->name('tests.updateAll');

// Role Routes --------------------
Route::resource('roles', 'RoleController');
Route::get('datatable/roles', 'RoleController@datatable')->name('roles.datatable');
Route::post('roles/updateAll', 'RoleController@updateAll')->name('roles.updateAll');
// Page Routes --------------------
Route::resource('pages', 'PageController');
Route::get('datatable/pages', 'PageController@datatable')->name('pages.datatable');
Route::post('pages/updateAll', 'PageController@updateAll')->name('pages.updateAll');
// Attachment Routes --------------------
Route::resource('attachments', 'AttachmentController');
Route::get('datatable/attachments', 'AttachmentController@datatable')->name('attachments.datatable');
Route::post('attachments/updateAll', 'AttachmentController@updateAll')->name('attachments.updateAll');
// Complain Routes --------------------
Route::resource('complaints', 'ComplaintController');
Route::get('datatable/complaints', 'ComplaintController@datatable')->name('complaints.datatable');
Route::post('complaints/updateAll', 'ComplaintController@updateAll')->name('complaints.updateAll');
// Order Routes --------------------
Route::resource('orders', 'OrderController');
Route::get('datatable/orders', 'OrderController@datatable')->name('orders.datatable');
Route::post('orders/updateAll', 'OrderController@updateAll')->name('orders.updateAll');
// Section Routes --------------------
Route::resource('sections', 'SectionController');
Route::get('datatable/sections', 'SectionController@datatable')->name('sections.datatable');
Route::post('sections/updateAll', 'SectionController@updateAll')->name('sections.updateAll');
// Service Routes --------------------
Route::resource('services', 'ServiceController');
Route::get('datatable/services', 'ServiceController@datatable')->name('services.datatable');
Route::post('services/updateAll', 'ServiceController@updateAll')->name('services.updateAll');
// Thread Routes --------------------
Route::resource('threads', 'ThreadController');
Route::get('datatable/threads', 'ThreadController@datatable')->name('threads.datatable');
Route::post('threads/updateAll', 'ThreadController@updateAll')->name('threads.updateAll');
// Product Routes --------------------
Route::resource('products', 'ProductController');
Route::get('datatable/products', 'ProductController@datatable')->name('products.datatable');
Route::post('products/updateAll', 'ProductController@updateAll')->name('products.updateAll');
// User Routes --------------------
Route::resource('users', 'UserController');
Route::get('datatable/users', 'UserController@datatable')->name('users.datatable');
Route::post('users/updateAll', 'UserController@updateAll')->name('users.updateAll');
// Withdraw Routes --------------------
Route::resource('withdraws', 'WithdrawController');
Route::get('datatable/withdraws', 'WithdrawController@datatable')->name('withdraws.datatable');
Route::post('withdraws/updateAll', 'WithdrawController@updateAll')->name('withdraws.updateAll');
// Newsletter Routes --------------------
Route::resource('newsletters', 'NewsletterController');
Route::get('datatable/newsletters', 'NewsletterController@datatable')->name('newsletters.datatable');
Route::post('newsletters/updateAll', 'NewsletterController@updateAll')->name('newsletters.updateAll');
// Advertisement Routes --------------------
Route::resource('advertisements', 'AdvertisementController');
Route::get('datatable/advertisements', 'AdvertisementController@datatable')->name('advertisements.datatable');
Route::post('advertisements/updateAll', 'AdvertisementController@updateAll')->name('advertisements.updateAll');
// Deposit Routes --------------------
Route::resource('deposits', 'DepositController');
Route::get('datatable/deposits', 'DepositController@datatable')->name('deposits.datatable');
Route::post('deposits/updateAll', 'DepositController@updateAll')->name('deposits.updateAll');
// ComplainType Routes --------------------
Route::resource('complaint_types', 'ComplainTypeController');
Route::get('datatable/complaint_types', 'ComplainTypeController@datatable')->name('complaint_types.datatable');
Route::post('complaint_types/updateAll', 'ComplainTypeController@updateAll')->name('complaint_types.updateAll');
// Comment Routes --------------------
Route::resource('comments', 'CommentController');
Route::get('datatable/comments', 'CommentController@datatable')->name('comments.datatable');
Route::post('comments/updateAll', 'CommentController@updateAll')->name('comments.updateAll');
// Photo Routes --------------------
Route::resource('photos', 'PhotoController');
Route::get('datatable/photos', 'PhotoController@datatable')->name('photos.datatable');
Route::post('photos/updateAll', 'PhotoController@updateAll')->name('photos.updateAll');
// Area Routes --------------------
Route::resource('areas', 'AreaController');
Route::get('datatable/areas', 'AreaController@datatable')->name('areas.datatable');
Route::post('areas/updateAll', 'AreaController@updateAll')->name('areas.updateAll');
// Address Routes --------------------
Route::resource('addresses', 'AddressController');
Route::get('datatable/addresses', 'AddressController@datatable')->name('addresses.datatable');
Route::post('addresses/updateAll', 'AddressController@updateAll')->name('addresses.updateAll');
// Plan Routes --------------------
Route::resource('plans', 'PlanController');
Route::get('datatable/plans', 'PlanController@datatable')->name('plans.datatable');
Route::post('plans/updateAll', 'PlanController@updateAll')->name('plans.updateAll');
// Subscription Routes --------------------
Route::resource('subscriptions', 'SubscriptionController');
Route::get('datatable/subscriptions', 'SubscriptionController@datatable')->name('subscriptions.datatable');
Route::post('subscriptions/updateAll', 'SubscriptionController@updateAll')->name('subscriptions.updateAll');
// Branch Routes --------------------
Route::resource('branches', 'BranchController');
Route::get('datatable/branches', 'BranchController@datatable')->name('branches.datatable');
Route::post('branches/updateAll', 'BranchController@updateAll')->name('branches.updateAll');
// Industry Routes --------------------
Route::resource('industries', 'IndustryController');
Route::get('datatable/industries', 'IndustryController@datatable')->name('industries.datatable');
Route::post('industries/updateAll', 'IndustryController@updateAll')->name('industries.updateAll');
// Currency Routes --------------------
Route::resource('currencies', 'CurrencyController');
Route::get('datatable/currencies', 'CurrencyController@datatable')->name('currencies.datatable');
Route::post('currencies/updateAll', 'CurrencyController@updateAll')->name('currencies.updateAll');
// PaymentMethod Routes --------------------
Route::resource('paymentmethods', 'PaymentMethodController');
Route::get('datatable/paymentmethods', 'PaymentMethodController@datatable')->name('paymentmethods.datatable');
Route::post('paymentmethods/updateAll', 'PaymentMethodController@updateAll')->name('paymentmethods.updateAll');
// Position Of Slider Routes --------------------
Route::resource('positionsliders', 'PositionSliderController');
Route::get('datatable/positionsliders', 'PositionSliderController@datatable')->name('positionsliders.datatable');
Route::post('positionsliders/updateAl')->name('sliders.updateAll');
// Slider Routes --------------------
Route::resource('sliders', 'SliderController');
Route::get('datatable/sliders', 'SliderController@datatable')->name('sliders.datatable');
Route::post('sliders/updateAll', 'SliderController@updateAll')->name('sliders.updateAll');
// homecomponent Routes --------------------
Route::resource('homecomponent', 'homecomponentController');
Route::get('datatable/homecomponent', 'homecomponentController@datatable')->name('homecomponent.datatable');
Route::post('homecomponent/updateAll', 'homecomponentController@updateAll')->name('homecomponent.updateAll');

// menu Routes --------------------
Route::resource('menu', 'MenuController');
Route::get('datatable/menu', 'MenuController@datatable')->name('menu.datatable');
Route::post('menu/updateAll', 'MenuController@updateAll')->name('menu.updateAll');


// servicewebsie Routes --------------------
Route::resource('servicewebsite', 'servicewebsiteController');
Route::get('datatable/servicewebsite', 'servicewebsiteController@datatable')->name('servicewebsite.datatable');
Route::post('servicewebsite/updateAll', 'servicewebsiteController@updateAll')->name('servicewebsite.updateAll');


// servicewebsie Routes --------------------
Route::resource('threadSection', 'threadSectionController');
Route::get('datatable/threadSection', 'threadSectionController@datatable')->name('threadSection.datatable');
Route::post('threadSection/updateAll', 'threadSectionController@updateAll')->name('threadSection.updateAll');

Route::get('notification/{id}/index','\App\Http\Controllers\Notifications\NotificationController@index')->name('notify');





