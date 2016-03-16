<?php

class AdminMaterialController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'Material')->lists('model_id');
		return View::make('admin.material.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.material.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$viId = CommonLanguage::createModel($input, 'Material', CommonProperty::getDefaultValue('Material', $input));
		if ($viId) {
			return Redirect::action('AdminMaterialController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('AdminMaterialController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('Material', $id, VI);
		$listId = AdminLanguage::where('model_name', 'Material')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = Material::whereIn('id', $listId)->get();
		return View::make('admin.material.edit')->with(compact('boxVi', 'boxEn'));
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
		CommonLanguage::updateModel('Material', $id, $input, CommonProperty::getDefaultValue('Material', $input));
		return Redirect::action('AdminMaterialController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonLanguage::deleteModel('Material', $id);
		return Redirect::action('AdminMaterialController@index')->with('message', 'Xoá thành công');
	}


}
