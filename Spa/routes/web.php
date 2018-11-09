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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admincp'],function(){
	Route::get('/','BackEnd\AdminCPLogin@showLogin')->name('admincp_showLogin');
	Route::get('login','AdminCP\AdminCPLogin@showLogin')->name('admincp_showLogin');

	Route::group(['prefix' => 'spa'],function(){
		Route::get('/','AdminCP\SpaManagementSystem\DashboardController@showDashBoard')->name('spa_showDashBoard');
		Route::get('/dashboard','AdminCP\SpaManagementSystem\DashboardController@showDashBoard')->name('spa_showDashBoard');
	});
});