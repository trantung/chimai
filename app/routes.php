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
		Route::resource('/child', 'BoxTypeChildController');
		//menu->ok
		Route::post('/menu/updateIndexData', 'AdminMenuController@updateIndexData');
		//content->ok
		Route::get('/content', 'AdminMenuController@content');
		//footer->ok
		Route::get('/footer', 'AdminMenuController@footer');
		Route::resource('/menu', 'AdminMenuController');
		//box tin tức hiển thị trên menu hoặc content->ok
		Route::resource('/type', 'BoxTypeController');
		//box bộ sưu tập hiển thị trên menu hoặc content->ok
		Route::resource('/collection', 'BoxCollectionController');
		//box sản phẩm hiển thị trên menu hoặc content->ok
		Route::resource('/product', 'BoxProductController');
		//box khuyến mãi hiển thị trên menu hoặc content->ok
		Route::resource('/promotion', 'BoxPromotionController');

		Route::resource('/pdf', 'BoxPdfController');

		Route::resource('/video', 'BoxVideoController');
		
		Route::resource('/showroom', 'BoxShowRoomController');

	});
	Route::group(['prefix' => 'property'], function(){
		//category->ok
		Route::resource('/category', 'AdminCategoryController');
		//chat lieu ->ok
		Route::resource('/material', 'AdminMaterialController');
		//xuat xu->ok
		Route::resource('/origin', 'AdminOriginController');
		//kich co->ok
		Route::resource('/size', 'AdminSizeController');
		//be mat->ok
		Route::resource('/surface', 'AdminSurfaceController');
	});
	//product->no

	//ok
	Route::get('/configcode', 'ConfigCodeController@editConfig');
	Route::post('/configcode', 'ConfigCodeController@updateConfig');
	//ok
	Route::get('/manager/changepassword/{id}', array('uses' => 'ManagerController@changePassword', 'as' => 'admin.manager.chanpassword'));
	Route::post('/manager/updatePassword/{id}', array('uses' => 'ManagerController@updatePassword'));
	Route::get('/manager/search', array('uses' => 'ManagerController@search', 'as' => 'admin.manager.search'));
	Route::resource('/manager', 'ManagerController');
	//ok
	Route::post('/contact/deleteSelected', 'AdminContactController@deleteSelected');
	Route::resource('/contact', 'AdminContactController');
	//no
	Route::resource('/newstype', 'NewsTypeController');
	Route::get('/news/search', array('uses' => 'NewsController@search', 'as' => 'admin.news.search'));
	Route::resource('/news', 'NewsController');
	//ok
	Route::resource('/slider', 'AdminSlideController');
	//
	Route::resource('/video', 'AdminVideoController');
	//upload pdf->no
	Route::resource('/pdf', 'AdminPdfController');
	//seo default
	Route::get('/seo', 'SeoController@editSeo');
	Route::put('/seo', 'SeoController@updateSeo');

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

		Route::get('/newsletter', 'SiteContactController@newsletter');
		Route::post('/newsletter', 'SiteContactController@newsletterSend');

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