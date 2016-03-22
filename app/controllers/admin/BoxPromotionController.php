<?php

class BoxPromotionController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $promotion = 
		return View::make('admin.box.promotion.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		$ob = Common::getObjectByModelId('BoxPromotion', $id);
		$boxVi = $ob[0];
		$boxEn = $ob[1];
		return View::make('admin.box.promotion.edit')->with(compact('boxVi', 'boxEn'));
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
		$validator = CommonRule::checkRules($input, 'BoxPromotionEdit');
		if(isset($validator)) {
			return Redirect::action('BoxPromotionController@edit', $id)->withErrors($validator);
		}
		Common::updateBox('BoxPromotion', $id, $input);
		return Redirect::action('AdminMenuController@index')->with('message', 'Sửa thành công');
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
