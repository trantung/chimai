<?php

class AdminSizeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'Size')->lists('model_id');
		return View::make('admin.size.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.size.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$viId = CommonLanguage::createModel($input, 'Size', CommonProperty::getDefaultValue('Size', $input));
		if ($viId) {
			return Redirect::action('AdminSizeController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('AdminSizeController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('Size', $id, VI);
		$listId = AdminLanguage::where('model_name', 'Size')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = Size::whereIn('id', $listId)->get();
		return View::make('admin.size.edit')->with(compact('boxVi', 'boxEn'));
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
		CommonLanguage::updateModel('Size', $id, $input, CommonProperty::getDefaultValue('Size', $input));
		return Redirect::action('AdminSizeController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonLanguage::deleteModel('Size', $id);
		return Redirect::action('AdminSizeController@index')->with('message', 'Xoá thành công');
	}


}
