<?php

class AdminImageController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'AdminImage')->lists('model_id');
		return View::make('admin.showroom.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.showroom.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$validator = CommonRule::checkRules($input, 'AdminImageCreate');
		if(isset($validator)) {
			return Redirect::action('AdminImageController@create')->withErrors($validator);
		}
		$viId = CommonLanguage::createModel($input, 'AdminImage', CommonProperty::getDefaultValue('AdminImage', $input), self::getConfigImage($input));
		if ($viId) {
			Common::commonUpdateField('BoxShowRoom', $viId, 'type', 'AdminImage', 'AdminLanguage');
			return Redirect::action('AdminImageController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('AdminImageController@index')->with('message', 'Tạo mới thất bại');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$boxVi = CommonLanguage::getObjectByLang('AdminImage', $id, VI);
		$listId = AdminLanguage::where('model_name', 'AdminImage')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = AdminImage::whereIn('id', $listId)->get();
		return View::make('admin.showroom.edit')->with(compact('boxVi', 'boxEn'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token');
		$validator = CommonRule::checkRules($input, 'AdminImageEdit');
		if(isset($validator)) {
			return Redirect::action('AdminImageController@edit', $id)->withErrors($validator);
		}
		CommonLanguage::updateModel('AdminImage', $id, $input, CommonProperty::getDefaultValue('AdminImage', $input), self::getConfigImage($input));
		Common::commonUpdateField('BoxShowRoom', $id, 'type', 'AdminImage', 'AdminLanguage');
		return Redirect::action('AdminImageController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonLanguage::deleteModel('AdminImage', $id);
		return Redirect::action('AdminImageController@index')->with('message', 'Xoá thành công');
	}

	private function getConfigImage($input)
	{
		return array(
				'w' => IMAGE_GALLERY_WIDTH, 
				'h' => IMAGE_GALLERY_HEIGHT, 
				'mode' => IMAGE_MODE_FIT
			);
	}

}
