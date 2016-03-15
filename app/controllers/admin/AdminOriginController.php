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
    	$viId = CommonProperty::createBox($input, 'Origin');
		if ($viId) {
			return Redirect::action('BoxTypeController@index')->with('message', 'Tạo mới thành công');
		}
		return Redirect::action('BoxTypeController@index')->with('message', 'Tạo mới thất bại');
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
		$ob = CommonProperty::getObjectByModelId('Origin', $id);
		$boxVi = $ob[0];
		$boxEn = $ob[1];
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
		$rules = CommonRule::getRules('Origin');
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('AdminOriginController@edit', $id)
				->withErrors($validator);
		} else {
			// CommonProperty::updateBox('Origin', $id, $input);
			CommonProperty::update('Origin', $id, $input);
			return Redirect::action('AdminOriginController@index')->with('message', 'Sửa thành công');;
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
