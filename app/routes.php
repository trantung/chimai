<?php
// dd(getLanguage());
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
// dd(CommonSlug::getCollectionContain('abc'));
Route::group(['prefix' => 'admin'], function () {

	Route::get('/login', array('uses' => 'AdminController@login', 'as' => 'admin.login'));
	Route::post('/login', array('uses' => 'AdminController@doLogin'));
	Route::get('/logout', array('uses' => 'AdminController@logout', 'as' => 'admin.logout'));
	Route::resource('/', 'AdminController');
	Route::group(['prefix' => 'box'], function(){
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
	Route::group(['prefix' => 'product'], function(){
		//product
		Route::resource('/normal', 'AdminProductController');
		//product images color
		Route::post('/color_get_image', 'AdminColorController@colorGetImage');
		Route::post('/color_upload_image', 'AdminColorController@colorUploadImage');
		Route::post('/color_delete_image', 'AdminColorController@colorDeleteImage');
		Route::post('/color_update_text', 'AdminColorController@colorUpdateText');
		//product images 
		Route::post('/picture_get_image', 'AdminPictureController@pictureGetImage');
		Route::post('/picture_upload_image', 'AdminPictureController@pictureUploadImage');
		Route::post('/picture_delete_image', 'AdminPictureController@pictureDeleteImage');
		Route::post('/picture_update_text', 'AdminPictureController@pictureUpdateText');
		//product search
		Route::get('/search', 'AdminProductController@search');
	});
	Route::group(['prefix' => 'news'], function(){
		//type new
		Route::resource('/type', 'NewsTypeController');
		//new
		Route::resource('/normal', 'NewsController');

	});

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
	//ok
	//The loai tin chuyen thanh tin tuc
	Route::get('/newstype/search', array('uses' => 'NewsTypeController@search', 'as' => 'admin.newstype.search'));
	Route::resource('/newstype', 'NewsTypeController');
	//ok
	//Bo tin tuc
	Route::get('/news/search', array('uses' => 'NewsController@search', 'as' => 'admin.news.search'));
	Route::resource('/news', 'NewsController');
	//ok
	Route::resource('/slider', 'AdminSlideController');
	//upload video 
	Route::resource('/video', 'AdminVideoController');
	//upload pdf->ok
	Route::get('/pdf/removeFile/{id}', 'AdminPdfController@removeFile');
	Route::resource('/pdf', 'AdminPdfController');
	//upload các hình ảnh khác 
	Route::resource('/showroom/image', 'AdminImageController');
	//seo default
	Route::get('/seo', 'SeoController@editSeo');
	Route::put('/seo', 'SeoController@updateSeo');

	// test ajax upload image
	Route::get('/test-upload-image', 'TestUploadImageController@index');
	Route::post('/test_get_image', 'TestUploadImageController@testGetImage');
	Route::post('/test_upload_image', 'TestUploadImageController@testUploadImage');
	Route::post('/test_delete_image', 'TestUploadImageController@testDeleteImage');
	Route::post('/test_update_text', 'TestUploadImageController@testUpdateText');

	Route::resource('/discount', 'DiscountController');

});

Route::group(
	array(
		'prefix' => LaravelLocalization::setLocale(),
		'before' => 'LaravelLocalizationRoutes' // Route translate filter
	),
	function()
	{
		Route::get('/search', 'SiteIndexController@search');

		Route::get('/newsletter', 'SiteContactController@newsletter');
		Route::post('/newsletter', 'SiteContactController@newsletterSend');

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

		Route::resource('/', 'SiteIndexController');
		Route::get('/{slug}', 'SiteIndexController@slug');
		Route::get('/{slug}/filter', 'SiteIndexController@filter');
		Route::get('/{slug}/{slugChild}', 'SiteIndexController@slugChild');
	}
);