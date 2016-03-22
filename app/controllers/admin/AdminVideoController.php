<?php

class AdminVideoController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'AdminVideo')->lists('model_id');
		return View::make('admin.video.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.video.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$validator = CommonRule::checkRules($input, 'AdminVideo');
		if(isset($validator)) {
			return Redirect::action('AdminVideoController@create')->withErrors($validator);
		}
		$viId = CommonLanguage::createModel($input, 'AdminVideo', CommonProperty::getDefaultValue('AdminVideo', $input));
		if ($viId) {
			Common::commonUpdateField('BoxVideo', $viId, 'type', 'AdminVideo', 'AdminLanguage');
			return Redirect::action('AdminVideoController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('AdminVideoController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('AdminVideo', $id, VI);
		$listId = AdminLanguage::where('model_name', 'AdminVideo')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = AdminVideo::whereIn('id', $listId)->get();
		return View::make('admin.video.edit')->with(compact('boxVi', 'boxEn'));
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
		$validator = CommonRule::checkRules($input, 'AdminVideo');
		if(isset($validator)) {
			return Redirect::action('AdminVideoController@edit', $id)->withErrors($validator);
		}
		CommonLanguage::updateModel('AdminVideo', $id, $input, CommonProperty::getDefaultValue('AdminVideo', $input));
		Common::commonUpdateField('BoxVideo', $id, 'type', 'AdminVideo', 'AdminLanguage');
		return Redirect::action('AdminVideoController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonLanguage::deleteModel('AdminVideo', $id);
		return Redirect::action('AdminVideoController@index')->with('message', 'Xoá thành công');
	}


}
