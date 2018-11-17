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
