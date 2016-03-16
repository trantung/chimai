<?php 

class SeoController extends AdminController {

	public function editSeo()
	{
		$inputSeo = AdminSeo::whereNull('model_id')->where('model_name', SEO_DEFAULT)->first();
		return View::make('admin.seo.edit')->with(compact('inputSeo'));
	}

	public function updateSeo()
	{
		$input = Input::except('_token');
		$inputSeo = AdminSeo::whereNull('model_id')->where('model_name', SEO_DEFAULT)->first();
		AdminSeo::find($inputSeo->id)->update($input);
		return Redirect::action('SeoController@editSeo');
	}

}
