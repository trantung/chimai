<?php

class AdminSurfaceController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'Surface')->lists('model_id');
		return View::make('admin.surface.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.surface.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$viId = CommonLanguage::createModel($input, 'Surface', CommonProperty::getDefaultValue('Surface', $input));
		if ($viId) {
			return Redirect::action('AdminSurfaceController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('AdminSurfaceController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('Surface', $id, VI);
		$listId = AdminLanguage::where('model_name', 'Surface')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = Surface::whereIn('id', $listId)->get();
		return View::make('admin.surface.edit')->with(compact('boxVi', 'boxEn'));
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
		CommonLanguage::updateModel('Surface', $id, $input, CommonProperty::getDefaultValue('Surface', $input));
		return Redirect::action('AdminSurfaceController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonLanguage::deleteModel('Surface', $id);
		return Redirect::action('AdminSurfaceController@index')->with('message', 'Xoá thành công');
	}


}
