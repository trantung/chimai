<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'admin'], function () {

	Route::get('/login', array('uses' => 'AdminController@login', 'as' => 'admin.login'));
	Route::post('/login', array('uses' => 'AdminController@doLogin'));
	Route::get('/logout', array('uses' => 'AdminController@logout', 'as' => 'admin.logout'));
	Route::resource('/', 'AdminController');
	Route::group(['prefix' => 'box'], function(){
		//menu
		Route::post('/menu/updateIndexData', 'AdminMenuController@updateIndexData');
		Route::resource('/menu', 'AdminMenuController');
		//content
		Route::resource('/content', 'AdminContentController');
		//footer
		Route::resource('/footer', 'AdminFooterController');

		//box tin tức hiển thị trên menu hoặc content
		Route::resource('/type', 'BoxTypeController');
		Route::resource('/type/child_type', 'BoxTypeChildController');
		//box bộ sưu tập hiển thị trên menu hoặc content
		Route::resource('/collection', 'BoxCollectionController');
		//box sản phẩm hiển thị trên menu hoặc content
		Route::resource('/product', 'BoxProductController');
	});

	Route::get('/configcode', 'ConfigCodeController@editConfig');
	Route::post('/configcode', 'ConfigCodeController@updateConfig');

	Route::get('/manager/changepassword/{id}', array('uses' => 'ManagerController@changePassword', 'as' => 'admin.manager.chanpassword'));
	Route::post('/manager/updatePassword/{id}', array('uses' => 'ManagerController@updatePassword'));
	Route::get('/manager/search', array('uses' => 'ManagerController@search', 'as' => 'admin.manager.search'));
	Route::resource('/manager', 'ManagerController');

	Route::get('/feedback', 'AdminContactController@feedback');

	Route::resource('/contact', 'AdminContactController');

	Route::resource('/bottomtext', 'BottomTextController');

	Route::resource('/newstype', 'NewsTypeController');

	Route::get('/news/search', array('uses' => 'NewsController@search', 'as' => 'admin.news.search'));
	Route::resource('/news', 'NewsController');

	Route::resource('/slider', 'AdminSlideController');

	Route::resource('/des_content', 'DesContentController');
	Route::resource('/introduce', 'AdminIntroduceController');
	Route::resource('/about_us_company', 'AdminAboutUsController');
	Route::resource('/type_about_us', 'AdminTypeAboutController');

});

Route::group(
	array(
		'prefix' => LaravelLocalization::setLocale(),
		'before' => 'LaravelLocalizationRoutes' // Route translate filter
	),
	function()
	{

		// demo page
		Route::get('/collection', 'SiteBoxCollectionController@collection');
		Route::get('/catalogue', 'SiteBoxCollectionController@catalogue');
		Route::get('/gallery', 'SiteBoxCollectionController@gallery');
		Route::get('/video', 'SiteBoxCollectionController@video');

		Route::get('/orders', 'SiteOrdersController@orders');
		Route::get('/orders_detail', 'SiteOrdersController@orders_detail');

		Route::get('/news', 'SiteNewsController@index');
		Route::get('/news-detail', 'SiteNewsController@detail');

		Route::get('/product', 'SiteBoxProductController@index');
		Route::get('/product-detail', 'SiteBoxProductController@detail');
		// END demo page

		Route::post('/sendLang', 'SiteIndexController@sendLang');

		/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
		Route::resource('/', 'SiteIndexController');

		Route::get(LaravelLocalization::transRoute('routes.about'), 'SiteBoxTypeController@index');
		Route::get(LaravelLocalization::transRoute('routes.contact'), 'SiteContactController@index');
		Route::post(LaravelLocalization::transRoute('routes.contact'), 'SiteContactController@contact');

		Route::resource(LaravelLocalization::transRoute('routes.resetpassword'), 'PasswordController', array('only'=>array('store', 'index')));
		Route::get(LaravelLocalization::transRoute('routes.login'), 'SiteController@login');
		Route::post(LaravelLocalization::transRoute('routes.login'), 'SiteController@doLogin');
		Route::get(LaravelLocalization::transRoute('routes.logout'), 'SiteController@logout');

		Route::get(LaravelLocalization::transRoute('routes.register'), 'SiteUserController@create');
		Route::post(LaravelLocalization::transRoute('routes.register'), 'SiteUserController@store');
		Route::get(LaravelLocalization::transRoute('routes.account'), 'SiteUserController@account');
		Route::put(LaravelLocalization::transRoute('routes.account'), 'SiteUserController@doAccount');

		Route::get(LaravelLocalization::transRoute('routes.cart'), 'SiteCartController@index');
		Route::get(LaravelLocalization::transRoute('routes.checkout'), 'SiteCartController@checkout');
		Route::get(LaravelLocalization::transRoute('routes.checkout_success'), 'SiteCartController@checkout_success');

		Route::get(LaravelLocalization::transRoute('routes.slug'), 'SiteTypeController@showSlug');
		Route::get(LaravelLocalization::transRoute('routes.slugDetail'), 'SiteTypeController@showChildSlug');

	}
);