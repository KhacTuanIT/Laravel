<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'Spa\PageController@getIndexPage')->name('home');
Route::get('/contact', 'Spa\PageController@getContactPage')->name('contact');
Route::get('/service', 'Spa\PageController@getServicesPage')->name('services');
Route::get('/pricing', 'Spa\PageController@getPricingPage')->name('pricing');
Route::get('/blog', 'Spa\PageController@getBlogPage')->name('blog');
Route::get('/gallery', 'Spa\PageController@getGalleryPage')->name('gallery');
Route::get('/signin', 'Spa\PageController@getSignInPage')->name('signin');
Route::get('/signup', 'Spa\PageController@getSignUpPage')->name('signup');

Route::group(['prefix' => 'admincp'],function(){
	Route::get('/','AdminCP\AdminCPLogin@showLogin')->name('admincp_showLogin');
	Route::get('login','AdminCP\AdminCPLogin@showLogin')->name('admincp_showLogin');

	Route::group(['prefix' => 'spa'],function(){
		Route::get('/','AdminCP\SpaManagementSystem\DashboardController@showDashBoard')->name('spa_showDashBoard');
		Route::get('/dashboard','AdminCP\SpaManagementSystem\DashboardController@showDashBoard')->name('spa_showDashBoard');
		Route::get('/booking','AdminCP\SpaManagementSystem\BookingForCustomerController@showBooking')->name('spa_showBooking');
		Route::post('/booking','AdminCP\SpaManagementSystem\BookingForCustomerController@booking')->name('spa_Booking');
		Route::get('/customer','AdminCP\SpaManagementSystem\CustomerBookingController@showCustomer')->name('spa_showCustomer');
		Route::get('/customer/{id}','AdminCP\SpaManagementSystem\CheckoutController@showCheckout')->name('spa_showCheckout');
		Route::get('/detailcustomer/{id}','AdminCP\SpaManagementSystem\CustomerBookingController@showDetail')->name('spa_showDetailCustomer');
		Route::get('/frmDetail/{id}','AdminCP\SpaManagementSystem\CustomerBookingController@showFormEditDetail')->name('spa_showfrmEditDetail');
	});
});

