<?php

class AdminOriginController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'Origin')->lists('model_id');
		return View::make('admin.origin.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.origin.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$viId = CommonLanguage::createModel($input, 'Origin', CommonProperty::getDefaultValue('Origin', $input));
		if ($viId) {
			return Redirect::action('AdminOriginController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('AdminOriginController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('Origin', $id, VI);
		$listId = AdminLanguage::where('model_name', 'Origin')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = Origin::whereIn('id', $listId)->get();
		return View::make('admin.origin.edit')->with(compact('boxVi', 'boxEn'));
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
		CommonLanguage::updateModel('Origin', $id, $input, CommonProperty::getDefaultValue('Origin', $input));
		return Redirect::action('AdminOriginController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonLanguage::deleteModel('Origin', $id);
		return Redirect::action('AdminOriginController@index')->with('message', 'Xoá thành công');
	}


}
