<?php

class AdminMenuController extends BoxController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$boxs = BoxCommon::where('position', MENU)->get();
		return View::make('admin.menu.index')->with(compact('boxs'));
	}

	public function updateIndexData()
	{
		$boxId = Input::get('box_id');
		$status = Input::get('status');
		$weightNumber = Input::get('weight_number');
		foreach($boxId as $key => $value) {
			$input = array(
				'status' => $status[$key],
				'weight_number' => $weightNumber[$key],
				);
			BoxCommon::find($value)->update($input);
		}
		dd(1);
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
		$box = BoxCommon::find($id);
		if ($box->model_name == 'BoxPromotion') {
			return View::make('admin.box.promotion.edit')->with(compact('box'));
		}
		if ($box->model_name == 'BoxType') {
			return View::make('admin.box.type.edit')->with(compact('box'));
		}
		if ($box->model_name == 'BoxCollection') {
			return View::make('admin.box.collection.edit')->with(compact('box'));
		}
		if ($box->model_name == 'BoxProduct') {
			return View::make('admin.box.collection.edit')->with(compact('box'));
		}

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
