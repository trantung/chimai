<?php

class AdminCategoryController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'Category')->lists('model_id');
		return View::make('admin.category.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.category.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$validator = CommonRule::checkRules($input, 'Category');
		if(isset($validator)) {
			return Redirect::action('AdminCategoryController@create')->withErrors($validator);
		}
		$viId = CommonLanguage::createModel($input, 'Category', CommonProperty::getDefaultValue('Category', $input));
		if ($viId) {
			return Redirect::action('AdminCategoryController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('AdminCategoryController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('Category', $id, VI);
		$listId = AdminLanguage::where('model_name', 'Category')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = Category::whereIn('id', $listId)->get();
		return View::make('admin.category.edit')->with(compact('boxVi', 'boxEn'));
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
		$validator = CommonRule::checkRules($input, 'Category');
		if(isset($validator)) {
			return Redirect::action('AdminCategoryController@edit', $id)->withErrors($validator);
		}
		CommonLanguage::updateModel('Category', $id, $input, CommonProperty::getDefaultValue('Category', $input));
		return Redirect::action('AdminCategoryController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonLanguage::deleteModel('Category', $id);
		return Redirect::action('AdminCategoryController@index')->with('message', 'Xoá thành công');
	}


}
