<?php

class BoxTypeChildController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = AdminLanguage::where('model_name', 'TypeNew')->lists('model_id');
		return View::make('admin.box.type.child.index')->with(compact('list'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.box.type.child.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$viId = CommonLanguage::createModel($input, 'TypeNew', CommonProperty::getDefaultValue('TypeNew', $input), self::getConfigImage($input));
		if ($viId) {
			return Redirect::action('BoxTypeChildController@index')
				->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('BoxTypeChildController@index')->with('message', 'Tạo mới thất bại');
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
		$boxVi = CommonLanguage::getObjectByLang('TypeNew', $id, VI);
		$listId = AdminLanguage::where('model_name', 'TypeNew')
			->where('model_id', $id)->lists('relate_id');
		$boxEn = TypeNew::whereIn('id', $listId)->get();
		return View::make('admin.box.type.child.edit')->with(compact('boxVi', 'boxEn'));
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
		CommonLanguage::updateModel('TypeNew', $id, $input, CommonProperty::getDefaultValue('TypeNew', $input));
		return Redirect::action('BoxTypeChildController@index')->with('message', 'Sửa thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonLanguage::deleteModel('TypeNew', $id);
		return Redirect::action('BoxTypeChildController@index')->with('message', 'Xoá thành công');
	}
	private function getConfigImage($input)
	{
		return array(
				'w' => IMAGE_WIDTH, 
				'h' => IMAGE_HEIGHT, 
				'mode' => IMAGE_MODE_FILL
			);
	}

}
