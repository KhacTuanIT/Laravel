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
use Illuminate\Http\Request;

Route::group(['prefix' => 'admincp'],function(){
	Route::get('/','AdminCP\AdminCPLogin@showLogin')->name('admincp_showLogin');
	Route::get('login','AdminCP\AdminCPLogin@showLogin')->name('admincp_showLogin');

	Route::group(['prefix' => 'spa'],function(){
		Route::get('/','AdminCP\SpaManagementSystem\DashboardController@showDashBoard')->name('spa_showDashBoard');
		Route::get('/dashboard','AdminCP\SpaManagementSystem\DashboardController@showDashBoard')->name('spa_showDashBoard');
		Route::get('/jsonliststaff','AdminCP\SpaManagementSystem\DashboardController@responseJsonListStaff')->name('spa_responseJsonListStaff');
		Route::get('ajaxviewroom','AdminCP\SpaManagementSystem\DashboardController@ajaxViewRoom')->name('spa_DashboardAjaxViewRoom');

		Route::group(['prefix' => 'booking'],function(){
			Route::get('/booking','AdminCP\SpaManagementSystem\BookingForCustomerController@showBooking')->name('spa_showBooking');
			Route::get('ajaxservices','AdminCP\SpaManagementSystem\BookingForCustomerController@ajaxPriceServices')->name('spams_ajaxPriceServices');
			Route::get('/searchcusmember','AdminCP\SpaManagementSystem\BookingForCustomerController@searchCustomerMember')->name('spa_searchCusMemBook');
			Route::get('/jsoninfocusmember/{id}','AdminCP\SpaManagementSystem\BookingForCustomerController@jsonShowInfoCusMember')->name('jsonShowInfoCusMember');
			Route::post('/bookingCustomer','AdminCP\SpaManagementSystem\BookingForCustomerController@bookingCustomer')->name('spa_BookingCustomer');
			Route::post('/bookingCustomerMember','AdminCP\SpaManagementSystem\BookingForCustomerController@bookingCustomerMember')->name('spa_BookingCustomerMember');
			Route::get('/tablesearchcusmember','AdminCP\SpaManagementSystem\BookingForCustomerController@searchTableCustomerMember')->name('spa_searchTableCusMemBook');
		});
		
		
		Route::get('/customer','AdminCP\SpaManagementSystem\CustomerBookingController@showCustomer')->name('spa_showCustomer');
		Route::get('apidata','AdminCP\SpaManagementSystem\CustomerBookingController@showCustomer2')->name('spa_jsda1');



		Route::group(['prefix' => 'sessiontable'],function(){
			Route::get('/getsstablecustomer','AdminCP\SpaManagementSystem\SessionTableHandleController@getSessionCustomer')->name('spa_getSessionCustomer');
			Route::get('/getsstablestaff','AdminCP\SpaManagementSystem\SessionTableHandleController@getSessionStaff')->name('spa_getSessionStaff');
		});

		Route::group(['prefix' => 'customerbooking'],function(){
			Route::get('/detailcustomer/{id}','AdminCP\SpaManagementSystem\CustomerBookingController@showDetail')->name('spa_showDetailCustomer');
			Route::get('/frmDetail/{id}','AdminCP\SpaManagementSystem\CustomerBookingController@showFormEditDetail')->name('spa_showfrmEditDetail');
			Route::post('/editcustomer','AdminCP\SpaManagementSystem\CustomerBookingController@editCustomer')->name('spa_editCustomer');
		});

		
		Route::group(['prefix' => 'checkout'],function(){
			Route::get('/checkout/{id}','AdminCP\SpaManagementSystem\CheckoutController@showCheckout')->name('spa_showCheckout');
			Route::get('/applycoupon','AdminCP\SpaManagementSystem\CheckoutController@applyCoupon')->name('spa_ApplyCoupon');
			Route::get('/getstockvalue','AdminCP\SpaManagementSystem\CheckoutController@getStockValueCoupon')->name('spa_getStockMoneyValue');
			Route::post('/checkoutcus/{id}','AdminCP\SpaManagementSystem\CheckoutController@checkout')->name('spa_checkout');
			Route::get('/checkoutcus/{id}','AdminCP\SpaManagementSystem\CheckoutController@redirectCheckoutCus');
			Route::get('/invoice/{member}/{id}','AdminCP\SpaManagementSystem\CheckoutController@printInvoice')->name('spa_printInvoice');
			Route::post('/showratingstaff/{id}','AdminCP\SpaManagementSystem\CheckoutController@showRatingStaff')->name('spa_showRatingStaff');
			Route::get('/getinfostaff/{id}','AdminCP\SpaManagementSystem\CheckoutController@getInforStaff')->name('spa_getinforstaff');
			Route::post('/setratingstaff/{id}','AdminCP\SpaManagementSystem\CheckoutController@setRatingStaff')->name('spa_setRatingStaff');
		});



		Route::group(['prefix' => 'search'],function(){
			Route::get('/','AdminCP\SpaManagementSystem\Search\SearchController@showSearch')->name('spa_showSearch');
			Route::get('/customermember','AdminCP\SpaManagementSystem\Search\SearchController@searchCustomerMember')->name('spa_searchCustomerMember');
			Route::get('/{staff}','AdminCP\SpaManagementSystem\Search\SearchController@searchStaff')->name('spa_searchStaff');
			Route::get('/room','AdminCP\SpaManagementSystem\Search\SearchController@searchRoom')->name('spa_searchRoom');
		});

		Route::group(['prefix' => 'customermember'],function(){
			Route::get('/addmember','AdminCP\SpaManagementSystem\CustomerMemberController@showAddCustomerMember')->name('spa_showAddMember');
			Route::post('/addmember','AdminCP\SpaManagementSystem\CustomerMemberController@addCustomerMember')->name('spa_addMember');
			Route::get('/listmember','AdminCP\SpaManagementSystem\CustomerMemberController@showListCustomerMember')->name('spa_showListCustomerMember');
			Route::get('/editmember/{id}','AdminCP\SpaManagementSystem\CustomerMemberController@showEditCustomerMember')->name('spa_showEditCustomerMember');
			Route::post('/editmember/{id}','AdminCP\SpaManagementSystem\CustomerMemberController@editCustomerMember')->name('spa_editCustomerMember');
		});

		Route::group(['prefix' => 'staff'],function(){
			Route::get('/addstaff','AdminCP\SpaManagementSystem\StaffController@showAddStaff')->name('spa_showAddStaff');
			Route::post('/addstaff','AdminCP\SpaManagementSystem\StaffController@addStaff')->name('spa_addStaff');
			Route::get('/liststaff','AdminCP\SpaManagementSystem\StaffController@showListStaff')->name('spa_showListStaff');
			Route::get('/editstaff/{id}','AdminCP\SpaManagementSystem\StaffController@showEditStaff')->name('spa_showEditStaff');
			Route::post('/editStaff/{id}','AdminCP\SpaManagementSystem\StaffController@editStaff')->name('spa_editStaff');
		});
	});
});