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

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});

Route::get('login',function(){
	return view('login');
});

Route::get('/contact', function() {
	return view('contact');
});
Route::group(['prefix' => 'admincp'],function(){
	Route::get('/','AdminCP\AdminCPLogin@showLogin')->name('admincp_showLogin');
	Route::get('login','AdminCP\AdminCPLogin@showLogin')->name('admincp_showLogin');

	Route::group(['prefix' => 'spa'],function(){
		Route::get('/','AdminCP\SpaManagementSystem\DashboardController@showDashBoard')->name('spa_showDashBoard');
		Route::get('/dashboard','AdminCP\SpaManagementSystem\DashboardController@showDashBoard')->name('spa_showDashBoard');
		Route::get('/booking','AdminCP\SpaManagementSystem\BookingForCustomerController@showBooking')->name('spa_showBooking');
		// Route::post('/booking','AdminCP\SpaManagementSystem\BookingForCustomerController@booking')->name('spa_Booking');
	});
});
=======
Route::get('/', 'Spa\PageController@getIndexPage')->name('home');
Route::get('/contact', 'Spa\PageController@getContactPage')->name('contact');
Route::get('/service', 'Spa\PageController@getServicesPage')->name('services');
Route::get('/pricing', 'Spa\PageController@getPricingPage')->name('pricing');
Route::get('/blog', 'Spa\PageController@getBlogPage')->name('blog');
Route::get('/gallery', 'Spa\PageController@getGalleryPage')->name('gallery');
Route::get('/signin', 'Spa\PageController@getSignInPage')->name('signin');
Route::get('/signup', 'Spa\PageController@getSignUpPage')->name('signup');
>>>>>>> origin/tuan_dev
