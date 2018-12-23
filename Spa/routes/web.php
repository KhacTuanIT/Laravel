<?php

Route::group(['namespace'=>'Spa'], function() {
	Route::get('', 'PageController@getIndexPage')->name('home');
	Route::get('/contact', 'PageController@getContactPage')->name('contact');
	Route::get('/service', 'PageController@getServicesPage')->name('services');
	Route::get('/pricing', 'PageController@getPricingPage')->name('pricing');
	Route::get('/blog', 'PageController@getBlogPage')->name('blog');
	Route::get('/gallery', 'PageController@getGalleryPage')->name('gallery');
	Route::get('/post/{id}','PageController@getPostSinglePage')->name('post-single');
	Route::get('/service/{id}','PageController@getServiceSinglePage')->name('service-single');
	Route::post('/feedback','FeedbackController@postFeedbackPage')->name('feedback');
	Route::post('/comment','CommentController@postCommentPage')->name('comment');
	Route::get('/comment/{id}/{idpost}','CommentController@getCommentPage')->name('load-comment');
	Route::post('/reply','ReplyController@postReplyPage')->name('reply');
	Route::post('/reservation','PageController@postReservationPage')->name('reservation');

});

Route::group(['namespace'=>'Spacms'], function() {

	Route::group(['prefix'=>'spacms'], function() {
		Route::group(['prefix'=>''], function() {
			Route::get('/', 'SpacmsController@getDashboard')->name('dashboard');
			Route::post('gdetail', 'SpacmsController@postGDetail')->name('gallery-detail');
			Route::post('pdetail', 'SpacmsController@postPDetail')->name('post-detail');
			Route::post('bdetail', 'SpacmsController@postBDetail')->name('blog-detail');
			Route::post('sdetail', 'SpacmsController@postSDetail')->name('service-detail');

			Route::post('gdetail/{id}', 'SpacmsController@postNextGDetail')->name('next-gallery-detail');
			Route::post('pdetail/{id}', 'SpacmsController@postNextPDetail')->name('next-post-detail');
			Route::post('bdetail/{id}', 'SpacmsController@postNextBDetail')->name('next-blog-detail');
			Route::post('sdetail/{id}', 'SpacmsController@postNextSDetail')->name('next-service-detail');

			Route::post('gdetail/{pre}/{next}', 'SpacmsController@postPreGDetail')->name('pre-gallery-detail');
			Route::post('pdetail/{pre}/{next}', 'SpacmsController@postPrePDetail')->name('pre-post-detail');
			Route::post('bdetail/{pre}/{next}', 'SpacmsController@postPreBDetail')->name('pre-blog-detail');
			Route::post('sdetail/{pre}/{next}', 'SpacmsController@postPreSDetail')->name('pre-service-detail');
			Route::post('rt', 'SpacmsController@postRT')->name('rt');
		});
		Route::group(['prefix'=>'gallery'], function() {
			Route::get('/','GallerycmsController@getGalleryCms')->name('gallery-cms');
			Route::get('/add','GallerycmsController@getAddGallery')->name('get-add-gallery');
			Route::post('/add','GallerycmsController@postAddGalleryCms')->name('add-gallery');
			Route::get('/delete/{id}','GallerycmsController@deleteGalleryCms')->name('delete-gallery');
			Route::post('/edited','GallerycmsController@postEditedGalleryCms')->name('edited-gallery');
			Route::get('/edit/{id}','GallerycmsController@getEditGalleryCms')->name('edit-gallery');
		});

		Route::group(['prefix'=>'post'], function() {
			Route::get('/','PostcmsController@getPostCms')->name('post-cms');
			Route::get('/add','PostcmsController@getAddPostCms')->name('get-add-post');
			Route::post('/add','PostcmsController@postAddPostCms')->name('post-add-post');
			Route::get('/edit/{id}','PostcmsController@getEditPostCms')->name('get-edit-post');
			Route::post('/edit/{id}','PostcmsController@postEditPostCms')->name('post-edit-post');
			Route::get('/delete/{id}','PostcmsController@getDeletePostCms')->name('get-delete-post');
		});

		Route::group(['prefix'=>'blog'], function() {
			Route::get('/','BlogcmsController@getBlogCms')->name('blog-cms');
			Route::get('/add','BlogcmsController@getAddBlogCms')->name('get-add-blog');
			Route::post('/add','BlogcmsController@postAddBlogCms')->name('post-add-blog');
			Route::get('/edit/{id}','BlogcmsController@getEditBlogCms')->name('get-edit-blog');
			Route::post('/edit/{id}','BlogcmsController@postEditBlogCms')->name('post-edit-blog');
			Route::get('/delete/{id}','BlogcmsController@getDeleteBlogCms')->name('get-delete-blog');
		});

		Route::group(['prefix'=>'service'], function() {
			Route::get('/','ServicecmsController@getServiceCms')->name('service-cms');
			Route::get('/add','ServicecmsController@getAddServiceCms')->name('get-add-service');
			Route::post('/add','ServicecmsController@postAddServiceCms')->name('post-add-service');
			Route::get('/edit/{id}','ServicecmsController@getEditServiceCms')->name('get-edit-service');
			Route::post('/edit/{id}','ServicecmsController@postEditServiceCms')->name('post-edit-service');
			Route::get('/delete/{id}','ServicecmsController@getDeleteServiceCms')->name('get-delete-service');
			Route::get('/sync','ServicecmsController@getSyncServiceCms')->name('get-sync-service');
		});

		Route::group(['prefix'=>'slider'], function() {
			Route::get('/','SlidercmsController@getSliderCms')->name('slider-cms');
			Route::get('/add', 'SlidercmsController@getAddSliderCms')->name('get-add-slider');
			Route::post('/add', 'SlidercmsController@postAddSliderCms')->name('post-add-slider');
			Route::get('delete/{id}', 'SlidercmsController@getDeleteSliderCms')->name('get-delete-slider');
		});

		Route::group(['prefix'=>'comment'], function() {
			Route::get('/','CommentcmsController@getCommentCms')->name('comment-cms');
			Route::post('/detail','CommentcmsController@postDetailCommentCms')->name('detail-comment-cms');
		});

		Route::group(['prefix'=>'feedback'], function() {
			Route::get('/','FeedbackcmsController@getFeedbackCms')->name('feedback-cms');
		});
	});
});
